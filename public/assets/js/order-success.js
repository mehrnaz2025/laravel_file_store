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
  // ۲. دانلود فایل
  // ========================================
  window.downloadFile = function(fileName) {
    // شبیه‌سازی دانلود
    const notification = document.createElement('div');
    notification.className = 'download-notification';
    notification.innerHTML = `
      <span class="notif-icon">️</span>
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
    
    console.log('Downloading:', fileName);
    
    // در واقعیت:
    // window.location.href = `/downloads/${fileName}`;
  };

  // ========================================
  // ۳. دانلود همه فایل‌ها
  // ========================================
  window.downloadAllFiles = function() {
    const notification = document.createElement('div');
    notification.className = 'download-notification';
    notification.innerHTML = `
      <span class="notif-icon"></span>
      <span>در حال آماده‌سازی فایل ZIP...</span>
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => {
      notification.classList.add('show');
    }, 10);
    
    setTimeout(() => {
      notification.innerHTML = `
        <span class="notif-icon">✅</span>
        <span>دانلود شروع شد!</span>
      `;
    }, 2000);
    
    setTimeout(() => {
      notification.classList.remove('show');
      setTimeout(() => notification.remove(), 300);
    }, 4000);
    
    console.log('Downloading all files as ZIP');
    
    // در واقعیت:
    // window.location.href = '/downloads/all-files.zip';
  };

  // ========================================
  // ۴. انیمیشن ورود کارت‌ها
  // ========================================
  const cards = document.querySelectorAll('.success-card, .download-card, .important-notes-card');
  cards.forEach((card, index) => {
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    
    setTimeout(() => {
      card.style.transition = 'all 0.6s ease';
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    }, index * 200);
  });












                            
  // ========================================
  // ۵. باز/بسته کردن فایل‌های داخلی
  // ========================================
  window.toggleSessionFiles = function(button) {
    const downloadItem = button.closest('.download-item');
    const isExpanded = downloadItem.classList.contains('expanded');
    
    if (isExpanded) {
      // بستن
      downloadItem.classList.remove('expanded');
      button.classList.remove('active');
      button.querySelector('span:last-child').textContent = 'نمایش فایل‌ها';
    } else {
      // باز کردن
      downloadItem.classList.add('expanded');
      button.classList.add('active');
      button.querySelector('span:last-child').textContent = 'مخفی کردن فایل‌ها';
    }
  };

});








