document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // ۱. مگا منو
  // ========================================
  const hamburgerBtn = document.getElementById('newHamburgerBtn');
  const megaNav = document.getElementById('newMegaMenuNav');
  const overlay = document.getElementById('newMegaOverlay');
  
  if (hamburgerBtn && megaNav) {
    hamburgerBtn.addEventListener('click', () => {
      hamburgerBtn.classList.toggle('active');
      megaNav.classList.toggle('active');
      if (overlay) overlay.classList.toggle('active');
    });
    if (overlay) {
      overlay.addEventListener('click', () => {
        hamburgerBtn.classList.remove('active');
        megaNav.classList.remove('active');
        overlay.classList.remove('active');
      });
    }
  }

  // ========================================
  // ۲. متغیرهای سراسری
  // ========================================
  let currentStep = 1;
  let contactType = 'mobile';
  let contactValue = '';
  let otpTimerInterval;

  // ========================================
  // ۳. انتخاب نوع تماس (موبایل/ایمیل)
  // ========================================
  const typeBtns = document.querySelectorAll('.type-btn');
  const mobileWrapper = document.getElementById('mobileInputWrapper');
  const emailWrapper = document.getElementById('emailInputWrapper');

  typeBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      typeBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      contactType = this.dataset.type;
      
      if (contactType === 'mobile') {
        mobileWrapper.style.display = 'block';
        emailWrapper.style.display = 'none';
      } else {
        mobileWrapper.style.display = 'none';
        emailWrapper.style.display = 'block';
      }
    });
  });

  // ========================================
  // ۴. مرحله ۱ به ۲
  // ========================================
  const btnStep1 = document.getElementById('btnStep1');
  
  btnStep1.addEventListener('click', function() {
    const mobile = document.getElementById('mobileInput').value.trim();
    const email = document.getElementById('emailInput').value.trim();
    
    if (contactType === 'mobile') {
      if (!mobile || mobile.length < 10) {
        alert('⚠️ لطفاً شماره موبایل معتبر وارد کنید');
        return;
      }
      contactValue = mobile;
    } else {
      if (!email || !email.includes('@')) {
        alert('⚠️ لطفاً ایمیل معتبر وارد کنید');
        return;
      }
      contactValue = email;
    }
    
    goToStep(2);
  });

  // ========================================
  // ۵. مرحله ۲: انتخاب روش احراز
  // ========================================
  const btnStep2 = document.getElementById('btnStep2');
  
  btnStep2.addEventListener('click', function() {
    const method = document.querySelector('input[name="authMethod"]:checked').value;
    
    if (method === 'otp') {
      goToStep('2Otp');
      startOtpTimer();
      sendOtp();
    } else {
      goToStep('2Password');
    }
  });

  // ========================================
  // ۶. OTP Inputs
  // ========================================
  const otpInputs = document.querySelectorAll('.otp-input');
  
  otpInputs.forEach((input, index) => {
    input.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
      
      if (this.value && index < otpInputs.length - 1) {
        otpInputs[index + 1].focus();
      }
    });
    
    input.addEventListener('keydown', function(e) {
      if (e.key === 'Backspace' && !this.value && index > 0) {
        otpInputs[index - 1].focus();
      }
    });
    
    input.addEventListener('paste', function(e) {
      e.preventDefault();
      const pastedData = e.clipboardData.getData('text').slice(0, 5);
      pastedData.split('').forEach((char, i) => {
        if (otpInputs[i]) {
          otpInputs[i].value = char;
        }
      });
      if (otpInputs[pastedData.length]) {
        otpInputs[pastedData.length].focus();
      }
    });
  });

  // ========================================
  // ۷. تأیید OTP
  // ========================================
  const btnVerifyOtp = document.getElementById('btnVerifyOtp');
  
  btnVerifyOtp.addEventListener('click', function() {
    let otp = '';
    otpInputs.forEach(input => otp += input.value);
    
    if (otp.length < 5) {
      alert('⚠️ لطفاً کد ۵ رقمی را کامل وارد کنید');
      return;
    }
    
    // شبیه‌سازی تأیید
    this.querySelector('span:first-child').textContent = 'در حال بررسی...';
    setTimeout(() => {
      goToStep('Success');
    }, 1500);
  });

  // ========================================
  // ۸. تأیید رمز ثابت
  // ========================================
  const btnVerifyPassword = document.getElementById('btnVerifyPassword');
  
  btnVerifyPassword.addEventListener('click', function() {
    const password = document.getElementById('passwordInput').value;
    
    if (!password || password.length < 6) {
      alert('️ رمز عبور باید حداقل ۶ کاراکتر باشد');
      return;
    }
    
    this.querySelector('span:first-child').textContent = 'در حال بررسی...';
    setTimeout(() => {
      goToStep('Success');
    }, 1500);
  });

  // ========================================
  // ۹. تکمیل ثبت‌نام
  // ========================================
  const btnCompleteRegister = document.getElementById('btnCompleteRegister');
  
  btnCompleteRegister.addEventListener('click', function() {
    const name = document.getElementById('fullName').value.trim();
    const password = document.getElementById('newPassword').value;
    const terms = document.getElementById('acceptTerms').checked;
    
    if (!name) {
      alert('⚠️ لطفاً نام خود را وارد کنید');
      return;
    }
    
    if (password.length < 8) {
      alert('⚠️ رمز عبور باید حداقل ۸ کاراکتر باشد');
      return;
    }
    
    if (!terms) {
      alert('⚠️ لطفاً قوانین و مقررات را بپذیرید');
      return;
    }
    
    this.querySelector('span:first-child').textContent = 'در حال ثبت‌نام...';
    setTimeout(() => {
      goToStep('Success');
    }, 1500);
  });

  // ========================================
  // ۱۰. دکمه‌های بازگشت
  // ========================================
  document.getElementById('btnBackToStep1').addEventListener('click', () => goToStep(1));
  document.getElementById('btnBackToStep2').addEventListener('click', () => goToStep(2));
  document.getElementById('btnBackToStep2FromPass').addEventListener('click', () => goToStep(2));
  document.getElementById('btnBackToStep1FromStep3').addEventListener('click', () => goToStep(1));

  // ========================================
  // ۱. Toggle Password
  // ========================================
  document.getElementById('togglePassword').addEventListener('click', function() {
    const input = document.getElementById('passwordInput');
    input.type = input.type === 'password' ? 'text' : 'password';
    this.querySelector('.eye-icon').textContent = input.type === 'password' ? '👁️' : '';
  });

  document.getElementById('toggleNewPassword').addEventListener('click', function() {
    const input = document.getElementById('newPassword');
    input.type = input.type === 'password' ? 'text' : 'password';
    this.querySelector('.eye-icon').textContent = input.type === 'password' ? '️' : '🙈';
  });

  // ========================================
  // ۱. Password Strength
  // ========================================
  const newPasswordInput = document.getElementById('newPassword');
  const strengthBar = document.querySelector('.strength-bar');
  
  newPasswordInput.addEventListener('input', function() {
    const password = this.value;
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
    if (password.match(/[0-9]/)) strength++;
    if (password.match(/[^a-zA-Z0-9]/)) strength++;
    
    strengthBar.className = 'strength-bar';
    if (strength <= 1) strengthBar.classList.add('weak');
    else if (strength <= 2) strengthBar.classList.add('medium');
    else strengthBar.classList.add('strong');
  });

  // ========================================
  // توابع کمکی
  // ========================================
  function goToStep(step) {
    document.querySelectorAll('.auth-step').forEach(s => s.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');
    
    // Update progress
    document.querySelectorAll('.progress-step').forEach((p, index) => {
      p.classList.remove('active', 'completed');
      if (index + 1 < step) p.classList.add('completed');
      else if (index + 1 === step) p.classList.add('active');
    });
    
    currentStep = step;
  }

  function startOtpTimer() {
    let time = 120;
    const timerDisplay = document.getElementById('otpTimer');
    const resendBtn = document.getElementById('btnResendOtp');
    
    resendBtn.disabled = true;
    
    clearInterval(otpTimerInterval);
    otpTimerInterval = setInterval(() => {
      const minutes = Math.floor(time / 60);
      const seconds = time % 60;
      timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
      
      if (time <= 0) {
        clearInterval(otpTimerInterval);
        resendBtn.disabled = false;
        timerDisplay.textContent = '۰۰:۰۰';
      }
      time--;
    }, 1000);
  }

  function sendOtp() {
    document.getElementById('contactDisplay').textContent = contactValue;
    document.getElementById('contactDisplayPass').textContent = contactValue;
    console.log('OTP sent to:', contactValue);
  }

  document.getElementById('btnResendOtp').addEventListener('click', function() {
    sendOtp();
    startOtpTimer();
    this.disabled = true;
  });

});