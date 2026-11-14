document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // ۱. مگا منو (کد استاندارد قبلی)
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
  // ۲. اعتبارسنجی فرم و پرداخت
  // ========================================
  const payBtn = document.getElementById('payBtn');
  
  if (payBtn) {
    payBtn.addEventListener('click', function(e) {
      e.preventDefault();
      
      // دریافت مقادیر
      const name = document.getElementById('fullName').value.trim();
      const mobile = document.getElementById('mobile').value.trim();
      const email = document.getElementById('email').value.trim();
      const terms = document.getElementById('termsCheck').checked;
      
      // اعتبارسنجی ساده
      if (!name || !mobile || !email) {
        alert('️ لطفاً تمام فیلدهای اطلاعات تماس را پر کنید.');
        return;
      }
      
      if (!terms) {
        alert('⚠️ لطفاً قوانین و مقررات را بپذیرید.');
        return;
      }
      
      // شبیه‌سازی ارسال به درگاه
      const originalText = this.querySelector('.btn-text').textContent;
      this.querySelector('.btn-text').textContent = 'در حال انتقال به درگاه...';
      this.style.opacity = '0.8';
      this.disabled = true;
      
      setTimeout(() => {
        alert('✅ به درگاه پرداخت متصل شدید! (این یک نسخه نمایشی است)');
        this.querySelector('.btn-text').textContent = originalText;
        this.style.opacity = '1';
        this.disabled = false;
      }, 1500);
    });
  }

  // ========================================
  // ۳. انتخاب روش پرداخت (افکت بصری)
  // ========================================
  const paymentRadios = document.querySelectorAll('input[name="paymentMethod"]');
  paymentRadios.forEach(radio => {
    radio.addEventListener('change', function() {
      // حذف کلاس active از همه کارت‌ها
      document.querySelectorAll('.payment-card').forEach(card => {
        card.style.transform = 'scale(1)';
      });
      // افکت روی کارت انتخاب شده
      if (this.checked) {
        this.closest('.payment-card').style.transform = 'scale(1.02)';
        setTimeout(() => {
          this.closest('.payment-card').style.transform = 'scale(1)';
        }, 200);
      }
    });
  });

});