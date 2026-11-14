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
  let selectedChargeAmount = 0;
  const currentBalance = 125000;

  // ========================================
  // ۳. فرمت مبلغ شارژ
  // ========================================
  window.formatChargeAmount = function(input) {
    let value = input.value.replace(/[^0-9]/g, '');
    if (value) {
      value = parseInt(value).toLocaleString('fa-IR');
    }
    input.value = value;
    
    const numericValue = parseInt(value.replace(/[^0-9]/g, '')) || 0;
    selectedChargeAmount = numericValue;
    updateSummary();
  };

  // ========================================
  // ۴. به‌روزرسانی خلاصه
  // ========================================
  function updateSummary() {
    document.getElementById('summaryChargeAmount').textContent = 
      selectedChargeAmount > 0 ? selectedChargeAmount.toLocaleString('fa-IR') + ' تومان' : '۰ تومان';
    
    document.getElementById('summaryTotal').textContent = 
      selectedChargeAmount > 0 ? selectedChargeAmount.toLocaleString('fa-IR') + ' تومان' : '۰ تومان';
    
    const payBtn = document.getElementById('btnPayWallet');
    payBtn.disabled = selectedChargeAmount < 10000;
  }

  // ========================================
  // ۵. پردازش پرداخت
  // ========================================
  window.processPayment = function() {
    if (selectedChargeAmount < 10000) {
      alert('⚠️ حداقل مبلغ شارژ ۱,۰۰۰ تومان است');
      return;
    }
    
    const btn = document.getElementById('btnPayWallet');
    const originalHTML = btn.innerHTML;
    btn.innerHTML = '<span>⏳ در حال انتقال به درگاه...</span>';
    btn.disabled = true;
    
    setTimeout(() => {
      alert(`✅ پرداخت با موفقیت انجام شد!\n\nمبلغ شارژ: ${selectedChargeAmount.toLocaleString('fa-IR')} تومان\n\nموجودی جدید: ${(currentBalance + selectedChargeAmount).toLocaleString('fa-IR')} تومان`);
      btn.innerHTML = originalHTML;
      btn.disabled = false;
    }, 2000);
  };

  // ========================================
  // ۶. Enter key support
  // ========================================
  document.getElementById('chargeAmount').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
      const value = parseInt(this.value.replace(/[^0-9]/g, '')) || 0;
      if (value >= 10000) {
        processPayment();
      }
    }
  });

});