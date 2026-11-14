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
        document.getElementById('mobileInput').focus();
      } else {
        mobileWrapper.style.display = 'none';
        emailWrapper.style.display = 'block';
        document.getElementById('emailInput').focus();
      }
      
      // پاک کردن خطاها
      clearErrors();
    });
  });

  // ========================================
  // ۴. مرحله ۱ به ۲ (ارسال OTP)
  // ========================================
  const btnStep1 = document.getElementById('btnStep1');
  
  btnStep1.addEventListener('click', function() {
    clearErrors();
    
    const mobile = document.getElementById('mobileInput').value.trim();
    const email = document.getElementById('emailInput').value.trim();
    
    let isValid = false;
    
    if (contactType === 'mobile') {
      if (!mobile) {
        showError('mobileInput', 'لطفاً شماره موبایل را وارد کنید');
        return;
      }
      if (!/^09\d{9}$/.test(mobile)) {
        showError('mobileInput', 'شماره موبایل باید با 09 شروع شود و ۱۱ رقم باشد');
        return;
      }
      contactValue = mobile;
      isValid = true;
    } else {
      if (!email) {
        showError('emailInput', 'لطفاً ایمیل را وارد کنید');
        return;
      }
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showError('emailInput', 'لطفاً یک ایمیل معتبر وارد کنید');
        return;
      }
      contactValue = email;
      isValid = true;
    }
    
    if (isValid) {
      // شبیه‌سازی ارسال OTP
      setLoading(btnStep1, true);
      setTimeout(() => {
        setLoading(btnStep1, false);
        document.getElementById('contactDisplay').textContent = contactValue;
        goToStep(2);
        startOtpTimer();
        console.log('OTP sent to:', contactValue);
      }, 1200);
    }
  });

  // ========================================
  // ۵. OTP Inputs
  // ========================================
  const otpInputs = document.querySelectorAll('.otp-input');
  
  otpInputs.forEach((input, index) => {
    input.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
      this.classList.remove('error');
      
      if (this.value && index < otpInputs.length - 1) {
        otpInputs[index + 1].focus();
      }
      
      // بررسی تکمیل بودن
      checkOtpComplete();
    });
    
    input.addEventListener('keydown', function(e) {
      if (e.key === 'Backspace' && !this.value && index > 0) {
        otpInputs[index - 1].focus();
      }
      if (e.key === 'Enter') {
        document.getElementById('btnVerifyOtp').click();
      }
    });
    
    input.addEventListener('paste', function(e) {
      e.preventDefault();
      const pastedData = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 5);
      pastedData.split('').forEach((char, i) => {
        if (otpInputs[i]) {
          otpInputs[i].value = char;
        }
      });
      if (pastedData.length > 0 && otpInputs[Math.min(pastedData.length, 4)]) {
        otpInputs[Math.min(pastedData.length, 4)].focus();
      }
      checkOtpComplete();
    });
    
    input.addEventListener('focus', function() {
      this.select();
    });
  });

  function checkOtpComplete() {
    let otp = '';
    otpInputs.forEach(input => otp += input.value);
    if (otp.length === 5) {
      document.getElementById('btnVerifyOtp').classList.add('ready');
    } else {
      document.getElementById('btnVerifyOtp').classList.remove('ready');
    }
  }

  // ========================================
  // ۶. تأیید OTP
  // ========================================
  const btnVerifyOtp = document.getElementById('btnVerifyOtp');
  
  btnVerifyOtp.addEventListener('click', function() {
    let otp = '';
    otpInputs.forEach(input => otp += input.value);
    
    if (otp.length < 5) {
      otpInputs.forEach(input => {
        if (!input.value) input.classList.add('error');
      });
      document.querySelector('.otp-inputs').classList.add('shake');
      setTimeout(() => {
        document.querySelector('.otp-inputs').classList.remove('shake');
      }, 400);
      return;
    }
    
    // شبیه‌سازی تأیید
    setLoading(this, true);
    setTimeout(() => {
      setLoading(this, false);
      goToStep(3);
      clearInterval(otpTimerInterval);
    }, 1200);
  });

  // ========================================
  // ۷. تغییر رمز عبور
  // ========================================
  const btnResetPassword = document.getElementById('btnResetPassword');
  
  btnResetPassword.addEventListener('click', function() {
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    
    clearErrors();
    
    if (newPassword.length < 8) {
      showError('newPassword', 'رمز عبور باید حداقل ۸ کاراکتر باشد');
      return;
    }
    
    if (newPassword !== confirmPassword) {
      showError('confirmPassword', 'رمز عبور و تکرار آن مطابقت ندارند');
      return;
    }
    
    // بررسی الزامات
    const requirements = checkPasswordRequirements(newPassword);
    if (!requirements.allValid) {
      alert('⚠️ لطفاً تمام الزامات رمز عبور را رعایت کنید');
      return;
    }
    
    // شبیه‌سازی تغییر رمز
    setLoading(this, true);
    setTimeout(() => {
      setLoading(this, false);
      goToStep('Success');
      console.log('Password reset for:', contactValue);
    }, 1500);
  });

  // ========================================
  // . بررسی قدرت رمز عبور
  // ========================================
  const newPasswordInput = document.getElementById('newPassword');
  const confirmPasswordInput = document.getElementById('confirmPassword');
  const strengthBar = document.querySelector('.strength-bar');
  
  newPasswordInput.addEventListener('input', function() {
    const password = this.value;
    updatePasswordRequirements(password);
    updatePasswordStrength(password);
    checkPasswordMatch();
  });
  
  confirmPasswordInput.addEventListener('input', function() {
    checkPasswordMatch();
  });

  function updatePasswordRequirements(password) {
    const reqs = {
      length: password.length >= 8,
      letter: /[a-zA-Z]/.test(password),
      number: /[0-9]/.test(password),
      special: /[^a-zA-Z0-9]/.test(password)
    };
    
    Object.keys(reqs).forEach(key => {
      const element = document.getElementById('req-' + key);
      const icon = element.querySelector('.req-icon');
      if (reqs[key]) {
        element.classList.add('valid');
        icon.textContent = '●';
      } else {
        element.classList.remove('valid');
        icon.textContent = '○';
      }
    });
  }

  function updatePasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^a-zA-Z0-9]/.test(password)) strength++;
    
    strengthBar.className = 'strength-bar';
    if (password.length === 0) {
      strengthBar.style.width = '0';
    } else if (strength <= 1) {
      strengthBar.classList.add('weak');
      strengthBar.style.width = '33%';
    } else if (strength <= 2) {
      strengthBar.classList.add('medium');
      strengthBar.style.width = '66%';
    } else {
      strengthBar.classList.add('strong');
      strengthBar.style.width = '100%';
    }
  }

  function checkPasswordMatch() {
    const password = document.getElementById('newPassword').value;
    const confirm = document.getElementById('confirmPassword').value;
    const matchHint = document.getElementById('matchHint');
    
    if (confirm.length === 0) {
      matchHint.textContent = '';
      document.getElementById('confirmPassword').classList.remove('error', 'success');
      return;
    }
    
    if (password === confirm) {
      matchHint.textContent = '✓ رمزهای عبور مطابقت دارند';
      matchHint.style.color = '#10b981';
      document.getElementById('confirmPassword').classList.remove('error');
      document.getElementById('confirmPassword').classList.add('success');
    } else {
      matchHint.textContent = '✗ رمزهای عبور مطابقت ندارند';
      matchHint.style.color = '#ef4444';
      document.getElementById('confirmPassword').classList.add('error');
      document.getElementById('confirmPassword').classList.remove('success');
    }
  }

  function checkPasswordRequirements(password) {
    return {
      length: password.length >= 8,
      letter: /[a-zA-Z]/.test(password),
      number: /[0-9]/.test(password),
      special: /[^a-zA-Z0-9]/.test(password),
      allValid: password.length >= 8 && /[a-zA-Z]/.test(password) && /[0-9]/.test(password) && /[^a-zA-Z0-9]/.test(password)
    };
  }

  // ========================================
  // ۹. Toggle Password
  // ========================================
  document.getElementById('toggleNewPassword').addEventListener('click', function() {
    const input = document.getElementById('newPassword');
    input.type = input.type === 'password' ? 'text' : 'password';
    this.querySelector('.eye-icon').textContent = input.type === 'password' ? '👁️' : '🙈';
  });

  document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
    const input = document.getElementById('confirmPassword');
    input.type = input.type === 'password' ? 'text' : 'password';
    this.querySelector('.eye-icon').textContent = input.type === 'password' ? '👁️' : '🙈';
  });

  // ========================================
  // ۱۰. دکمه‌های بازگشت
  // ========================================
  document.getElementById('btnBackToStep1').addEventListener('click', () => {
    goToStep(1);
    clearInterval(otpTimerInterval);
  });
  
  document.getElementById('btnBackToStep2').addEventListener('click', () => {
    goToStep(2);
    startOtpTimer();
  });

  // ========================================
  // ۱۱. توابع کمکی
  // ========================================
  function goToStep(step) {
    document.querySelectorAll('.auth-step').forEach(s => s.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');
    
    document.querySelectorAll('.progress-step').forEach((p, index) => {
      p.classList.remove('active', 'completed');
      if (index + 1 < step) p.classList.add('completed');
      else if (index + 1 === step) p.classList.add('active');
    });
    
    currentStep = step;
    window.scrollTo({ top: 0, behavior: 'smooth' });
  }

  function startOtpTimer() {
    let time = 120;
    const timerDisplay = document.getElementById('otpTimer');
    const resendBtn = document.getElementById('btnResendOtp');
    
    resendBtn.disabled = true;
    resendBtn.textContent = '🔄 ارسال مجدد کد';
    
    clearInterval(otpTimerInterval);
    otpTimerInterval = setInterval(() => {
      const minutes = Math.floor(time / 60);
      const seconds = time % 60;
      timerDisplay.textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
      
      if (time <= 0) {
        clearInterval(otpTimerInterval);
        resendBtn.disabled = false;
        timerDisplay.textContent = '۰۰:۰';
        resendBtn.textContent = '🔄 ارسال مجدد کد';
      }
      time--;
    }, 1000);
  }

  document.getElementById('btnResendOtp').addEventListener('click', function() {
    this.disabled = true;
    this.textContent = '⏳ در حال ارسال...';
    
    setTimeout(() => {
      startOtpTimer();
      console.log('OTP resent to:', contactValue);
    }, 1000);
  });

  function showError(inputId, message) {
    const input = document.getElementById(inputId);
    input.classList.add('error');
    input.parentElement.classList.add('shake');
    
    const hint = input.parentElement.nextElementSibling;
    if (hint && hint.classList.contains('input-hint')) {
      const originalText = hint.textContent;
      hint.textContent = '⚠️ ' + message;
      hint.style.color = '#ef4444';
      setTimeout(() => {
        hint.textContent = originalText;
        hint.style.color = '';
      }, 3000);
    }
    
    setTimeout(() => {
      input.parentElement.classList.remove('shake');
    }, 400);
    
    input.focus();
  }

  function clearErrors() {
    document.querySelectorAll('.form-input').forEach(input => {
      input.classList.remove('error', 'success');
    });
  }

  function setLoading(button, isLoading) {
    if (isLoading) {
      button.classList.add('loading');
      button.dataset.originalText = button.querySelector('span:first-child').textContent;
      button.querySelector('span:first-child').textContent = 'در حال پردازش...';
    } else {
      button.classList.remove('loading');
      if (button.dataset.originalText) {
        button.querySelector('span:first-child').textContent = button.dataset.originalText;
      }
    }
  }

  // ========================================
  // ۱۲. Enter key support
  // ========================================
  document.getElementById('mobileInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') btnStep1.click();
  });
  
  document.getElementById('emailInput').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') btnStep1.click();
  });
  
  document.getElementById('confirmPassword').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') btnResetPassword.click();
  });

});