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
  // ۲. سوییچ بین بخش‌های داشبورد
  // ========================================
  const menuItems = document.querySelectorAll('.menu-item');
  const sections = document.querySelectorAll('.dashboard-section');
  
  menuItems.forEach(item => {
    item.addEventListener('click', function() {
      const section = this.dataset.section;
      if (section) {
        switchSection(section);
      }
    });
  });
  
  window.switchSection = function(sectionId) {
    menuItems.forEach(m => m.classList.remove('active'));
    const targetMenu = document.querySelector(`[data-section="${sectionId}"]`);
    if (targetMenu) targetMenu.classList.add('active');
    
    sections.forEach(s => s.classList.remove('active'));
    document.getElementById('section-' + sectionId).classList.add('active');
    
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  // ========================================
  // ۳. فرم پروفایل
  // ========================================
  const profileForm = document.getElementById('profileForm');
  if (profileForm) {
    profileForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const firstName = document.getElementById('firstName').value;
      const lastName = document.getElementById('lastName').value;
      
      document.getElementById('sidebarUserName').textContent = firstName + ' ' + lastName;
      
      alert('✅ اطلاعات پروفایل با موفقیت ذخیره شد!');
    });
  }

  // ========================================
  // ۴. فرم تیکت
  // ========================================
  const btnNewTicket = document.getElementById('btnNewTicket');
  const newTicketForm = document.getElementById('newTicketForm');
  const btnCloseTicket = document.getElementById('btnCloseTicket');
  const btnCancelTicket = document.getElementById('btnCancelTicket');
  const ticketForm = document.getElementById('ticketForm');
  
  if (btnNewTicket) {
    btnNewTicket.addEventListener('click', () => {
      newTicketForm.style.display = 'block';
      newTicketForm.scrollIntoView({ behavior: 'smooth' });
    });
  }
  
  if (btnCloseTicket) {
    btnCloseTicket.addEventListener('click', () => {
      newTicketForm.style.display = 'none';
    });
  }
  
  if (btnCancelTicket) {
    btnCancelTicket.addEventListener('click', () => {
      newTicketForm.style.display = 'none';
    });
  }
  
  if (ticketForm) {
    ticketForm.addEventListener('submit', function(e) {
      e.preventDefault();
      alert('✅ تیکت شما با موفقیت ارسال شد! به زودی پاسخ داده می‌شود.');
      ticketForm.reset();
      newTicketForm.style.display = 'none';
    });
  }

  // ========================================
  // ۵. امنیت - تغییر رمز با OTP
  // ========================================
  let secOtpTimerInterval;
  
  document.getElementById('btnSecStep1').addEventListener('click', function() {
    document.getElementById('secStep1').classList.remove('active');
    document.getElementById('secStep2').classList.add('active');
    startSecOtpTimer();
    console.log('OTP sent');
  });
  
  document.getElementById('btnSecBack1').addEventListener('click', () => {
    document.getElementById('secStep2').classList.remove('active');
    document.getElementById('secStep1').classList.add('active');
    clearInterval(secOtpTimerInterval);
  });
  
  // OTP inputs
  const secOtpInputs = document.querySelectorAll('#secStep2 .otp-input');
  secOtpInputs.forEach((input, index) => {
    input.addEventListener('input', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
      if (this.value && index < secOtpInputs.length - 1) {
        secOtpInputs[index + 1].focus();
      }
    });
    input.addEventListener('keydown', function(e) {
      if (e.key === 'Backspace' && !this.value && index > 0) {
        secOtpInputs[index - 1].focus();
      }
    });
  });
  
  document.getElementById('btnSecVerifyOtp').addEventListener('click', function() {
    let otp = '';
    secOtpInputs.forEach(input => otp += input.value);
    if (otp.length < 5) {
      alert('⚠️ لطفاً کد  رقمی را کامل وارد کنید');
      return;
    }
    document.getElementById('secStep2').classList.remove('active');
    document.getElementById('secStep3').classList.add('active');
    clearInterval(secOtpTimerInterval);
  });
  
  document.getElementById('btnSecBack2').addEventListener('click', () => {
    document.getElementById('secStep3').classList.remove('active');
    document.getElementById('secStep2').classList.add('active');
    startSecOtpTimer();
  });
  
  // Password strength
  const newSecPassword = document.getElementById('newSecPassword');
  const confirmSecPassword = document.getElementById('confirmSecPassword');
  const secStrengthBar = document.querySelector('#secStep3 .strength-bar');
  const secMatchHint = document.getElementById('secMatchHint');
  
  newSecPassword.addEventListener('input', function() {
    const password = this.value;
    let strength = 0;
    const reqs = {
      length: password.length >= 8,
      letter: /[a-zA-Z]/.test(password),
      number: /[0-9]/.test(password),
      special: /[^a-zA-Z0-9]/.test(password)
    };
    
    Object.keys(reqs).forEach(key => {
      const el = document.getElementById('sec-req-' + key);
      if (el) {
        if (reqs[key]) {
          el.classList.add('valid');
          el.querySelector('.req-icon').textContent = '●';
        } else {
          el.classList.remove('valid');
          el.querySelector('.req-icon').textContent = '○';
        }
      }
    });
    
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^a-zA-Z0-9]/.test(password)) strength++;
    
    secStrengthBar.className = 'strength-bar';
    if (password.length === 0) secStrengthBar.style.width = '0';
    else if (strength <= 1) { secStrengthBar.classList.add('weak'); secStrengthBar.style.width = '33%'; }
    else if (strength <= 2) { secStrengthBar.classList.add('medium'); secStrengthBar.style.width = '66%'; }
    else { secStrengthBar.classList.add('strong'); secStrengthBar.style.width = '100%'; }
    
    checkSecMatch();
  });
  
  confirmSecPassword.addEventListener('input', checkSecMatch);
  
  function checkSecMatch() {
    const p1 = newSecPassword.value;
    const p2 = confirmSecPassword.value;
    if (p2.length === 0) {
      secMatchHint.textContent = '';
      return;
    }
    if (p1 === p2) {
      secMatchHint.textContent = '✓ رمزها مطابقت دارند';
      secMatchHint.style.color = '#10b981';
    } else {
      secMatchHint.textContent = ' رمزها مطابقت ندارند';
      secMatchHint.style.color = '#ef4444';
    }
  }
  
  // Toggle password
  document.querySelectorAll('.toggle-password').forEach(btn => {
    btn.addEventListener('click', function() {
      const input = this.parentElement.querySelector('input');
      input.type = input.type === 'password' ? 'text' : 'password';
      this.querySelector('.eye-icon').textContent = input.type === 'password' ? '👁️' : '';
    });
  });
  
  document.getElementById('btnSecChangePassword').addEventListener('click', function() {
    const current = document.getElementById('currentPassword').value;
    const newP = document.getElementById('newSecPassword').value;
    const confirm = document.getElementById('confirmSecPassword').value;
    
    if (!current) { alert('️ رمز فعلی را وارد کنید'); return; }
    if (newP.length < 8) { alert('⚠️ رمز جدید باید حداقل ۸ کاراکتر باشد'); return; }
    if (newP !== confirm) { alert('⚠️ رمز جدید و تکرار آن مطابقت ندارند'); return; }
    
    document.getElementById('secStep3').classList.remove('active');
    document.getElementById('secStepSuccess').classList.add('active');
  });
  
  function startSecOtpTimer() {
    let time = 120;
    const timerDisplay = document.getElementById('secOtpTimer');
    const resendBtn = document.getElementById('btnSecResend');
    resendBtn.disabled = true;
    clearInterval(secOtpTimerInterval);
    secOtpTimerInterval = setInterval(() => {
      const m = Math.floor(time / 60);
      const s = time % 60;
      timerDisplay.textContent = `${String(m).padStart(2,'0')}:${String(s).padStart(2,'0')}`;
      if (time <= 0) {
        clearInterval(secOtpTimerInterval);
        resendBtn.disabled = false;
      }
      time--;
    }, 1000);
  }
  
  document.getElementById('btnSecResend').addEventListener('click', function() {
    this.disabled = true;
    startSecOtpTimer();
  });

  // ========================================
  // ۶. فیلتر تب‌ها
  // ========================================
  document.querySelectorAll('.filter-tabs').forEach(tabs => {
    tabs.querySelectorAll('.filter-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        this.parentElement.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
      });
    });
  });

});



  // ========================================
  // ۸. Accordion کتابخانه
  // ========================================
  window.toggleLibraryItem = function(header) {
    const item = header.closest('.library-item');
    const wasOpen = item.classList.contains('open');
    
    // بستن همه آیتم‌ها (اختیاری - برای حالت تک باز)
    // document.querySelectorAll('.library-item').forEach(i => i.classList.remove('open'));
    
    if (wasOpen) {
      item.classList.remove('open');
    } else {
      item.classList.add('open');
    }
  };

  // ========================================
  // ۹. Sticky Media Player
  // ========================================
  let currentPlayingType = null; // 'audio' یا 'video'
  let currentPlayingFile = null;
  let isPlaying = false;
  let progressInterval = null;
  
  window.playAudio = function(element, title, fileUrl) {
    // نمایش پلیر
    const player = document.getElementById('stickyPlayer');
    player.style.display = 'block';
    
    // به‌روزرسانی اطلاعات
    document.getElementById('playerTitle').textContent = title;
    document.getElementById('playerSubtitle').textContent = 'کتاب صوتی مدیریت زمان';
    document.getElementById('playerThumbIcon').textContent = '🎵';
    document.getElementById('btnMainPlay').textContent = '⏸️';
    
    currentPlayingType = 'audio';
    currentPlayingFile = fileUrl;
    isPlaying = true;
    
    // شروع انیمیشن پیشرفت (شبیه‌سازی)
    startProgressSimulation();
    
    // به‌روزرسانی وضعیت جلسه
    updateSessionStatus(element, 'current');
    
    console.log('Playing audio:', title, fileUrl);
    
    // اسکرول به پلیر اگر مخفی است
    // player.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  };
  
  window.playVideo = function(element, title, fileUrl) {
    // باز کردن Modal برای ویدیو
    const modal = document.getElementById('mediaModal');
    modal.style.display = 'flex';
    document.getElementById('modalTitle').textContent = title;
    
    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
      <video controls autoplay style="width: 100%; height: 100%;">
        <source src="${fileUrl}" type="video/mp4">
        مرورگر شما از پخش ویدیو پشتیبانی نمی‌کند.
      </video>
    `;
    
    updateSessionStatus(element, 'current');
    console.log('Playing video:', title, fileUrl);
  };
  
  window.viewPdf = function(fileUrl) {
    const modal = document.getElementById('mediaModal');
    modal.style.display = 'flex';
    document.getElementById('modalTitle').textContent = 'نمایشگر PDF';
    
    const modalBody = document.getElementById('modalBody');
    modalBody.innerHTML = `
      <iframe src="${fileUrl}" style="width: 100%; height: 100%;"></iframe>
    `;
    
    console.log('Viewing PDF:', fileUrl);
  };
  
  window.closeMediaModal = function() {
    const modal = document.getElementById('mediaModal');
    modal.style.display = 'none';
    document.getElementById('modalBody').innerHTML = '';
  };
  
  window.toggleMainPlay = function() {
    const btn = document.getElementById('btnMainPlay');
    if (isPlaying) {
      btn.textContent = '▶️';
      isPlaying = false;
      clearInterval(progressInterval);
    } else {
      btn.textContent = '⏸️';
      isPlaying = true;
      startProgressSimulation();
    }
  };
  
  window.closePlayer = function() {
    const player = document.getElementById('stickyPlayer');
    player.style.display = 'none';
    isPlaying = false;
    clearInterval(progressInterval);
    
    // پاک کردن وضعیت current از همه جلسات
    document.querySelectorAll('.session-item.current').forEach(item => {
      item.classList.remove('current');
      item.classList.add('played');
      const status = item.querySelector('.session-status');
      if (status) {
        status.textContent = '✓ گوش داده شده';
        status.classList.remove('current');
      }
      const playBtn = item.querySelector('.btn-session-play');
      if (playBtn) {
        playBtn.textContent = '▶️ پخش';
        playBtn.classList.remove('playing');
      }
    });
  };
  
  window.downloadCurrentFile = function() {
    if (currentPlayingFile) {
      downloadFile('فایل در حال پخش', currentPlayingFile);
    }
  };
  
  function startProgressSimulation() {
    clearInterval(progressInterval);
    let progress = parseFloat(document.getElementById('playerProgressFill').style.width) || 0;
    
    progressInterval = setInterval(() => {
      if (!isPlaying) return;
      progress += 0.1;
      if (progress >= 100) {
        progress = 0;
        clearInterval(progressInterval);
      }
      document.getElementById('playerProgressFill').style.width = progress + '%';
      
      // به‌روزرسانی زمان
      const totalSeconds = 1530; // 25:30
      const currentSeconds = Math.floor((progress / 100) * totalSeconds);
      const currentMin = Math.floor(currentSeconds / 60);
      const currentSec = currentSeconds % 60;
      document.getElementById('timeCurrent').textContent = 
        `${String(currentMin).padStart(2, '0')}:${String(currentSec).padStart(2, '0')}`;
    }, 1000);
  }
  
  function updateSessionStatus(element, status) {
    const sessionItem = element.closest('.session-item');
    if (!sessionItem) return;
    
    // پاک کردن وضعیت current از همه
    document.querySelectorAll('.session-item.current').forEach(item => {
      if (item !== sessionItem) {
        item.classList.remove('current');
        item.classList.add('played');
        const statusEl = item.querySelector('.session-status');
        if (statusEl) {
          statusEl.textContent = '✓ گوش داده شده';
          statusEl.classList.remove('current');
        }
        const playBtn = item.querySelector('.btn-session-play');
        if (playBtn) {
          playBtn.textContent = '▶️ پخش';
          playBtn.classList.remove('playing');
        }
      }
    });
    
    // تنظیم وضعیت current
    sessionItem.classList.remove('played');
    sessionItem.classList.add('current');
    
    const statusEl = sessionItem.querySelector('.session-status');
    if (statusEl) {
      statusEl.textContent = '🎵 در حال پخش';
      statusEl.classList.add('current');
    }
    
    const playBtn = sessionItem.querySelector('.btn-session-play');
    if (playBtn) {
      playBtn.textContent = '⏸️ توقف';
      playBtn.classList.add('playing');
    }
  }
  
  window.downloadFile = function(fileName, fileUrl) {
    // شبیه‌سازی دانلود
    const link = document.createElement('a');
    link.href = fileUrl;
    link.download = fileName;
    
    // نمایش پیام
    const notification = document.createElement('div');
    notification.className = 'download-notification';
    notification.innerHTML = `
      <span class="notif-icon">⬇️</span>
      <span>در حال دانلود: <strong>${fileName}</strong></span>
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => {
      notification.classList.add('show');
    }, 10);
    
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => notification.remove(), 300);
    }, 3000);
    
    console.log('Downloading:', fileName, fileUrl);
  };
  
  // سرعت پخش
  const speeds = ['0.5x', '1x', '1.25x', '1.5x', '2x'];
  let currentSpeedIndex = 1;
  
  document.getElementById('btnSpeed').addEventListener('click', function() {
    currentSpeedIndex = (currentSpeedIndex + 1) % speeds.length;
    this.textContent = speeds[currentSpeedIndex];
  });


    // ========================================
  // ۱۰. Modal شارژ کیف پول
  // ========================================
  let selectedChargeAmount = 0;
  
  // باز کردن Modal
  document.querySelector('.btn-charge-wallet').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('walletChargeModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
  });
  
  // بستن Modal
  window.closeWalletModal = function() {
    document.getElementById('walletChargeModal').style.display = 'none';
    document.body.style.overflow = '';
    resetChargeForm();
  };
  
  // انتخاب مبلغ
  window.selectChargeAmount = function(btn, amount) {
    // حذف selected از همه
    document.querySelectorAll('.charge-amount-btn').forEach(b => b.classList.remove('selected'));
    btn.classList.add('selected');
    
    selectedChargeAmount = amount;
    document.getElementById('customChargeAmount').value = '';
    updateChargeSummary(amount);
  };
  
  // فرمت مبلغ دلخواه
  window.formatChargeAmount = function(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    if (value) {
      value = parseInt(value).toLocaleString('fa-IR');
    }
    input.value = value;
    
    // حذف selected از دکمه‌ها
    document.querySelectorAll('.charge-amount-btn').forEach(b => b.classList.remove('selected'));
    
    const numericValue = parseInt(value.replace(/[^0-9]/g, '')) || 0;
    selectedChargeAmount = numericValue;
    updateChargeSummary(numericValue);
  };
  
  // به‌روزرسانی خلاصه
  function updateChargeSummary(amount) {
    const formatted = amount > 0 ? amount.toLocaleString('fa-IR') + ' تومان' : '۰ تومان';
    document.getElementById('chargeSummaryAmount').textContent = formatted;
    document.getElementById('chargeSummaryTotal').textContent = formatted;
    
    const payBtn = document.getElementById('btnPayCharge');
    payBtn.disabled = amount < 10000;
  }
  
  // پردازش شارژ
  window.processWalletCharge = function() {
    if (selectedChargeAmount < 10000) {
      alert('⚠️ حداقل مبلغ شارژ ۱۰,۰۰۰ تومان است');
      return;
    }
    
    const btn = document.getElementById('btnPayCharge');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<span>⏳ در حال انتقال به درگاه...</span>';
    btn.disabled = true;
    
    setTimeout(() => {
      alert('✅ به درگاه پرداخت متصل شدید! (نسخه نمایشی)');
      btn.innerHTML = originalText;
      btn.disabled = false;
      closeWalletModal();
    }, 1500);
  };
  
  // ریست فرم
  function resetChargeForm() {
    selectedChargeAmount = 0;
    document.querySelectorAll('.charge-amount-btn').forEach(b => b.classList.remove('selected'));
    document.getElementById('customChargeAmount').value = '';
    updateChargeSummary(0);
  }
  
  // بستن با ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      const modal = document.getElementById('walletChargeModal');
      if (modal.style.display === 'flex') {
        closeWalletModal();
      }
    }
  });