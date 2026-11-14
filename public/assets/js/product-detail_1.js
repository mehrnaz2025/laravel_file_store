document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // ۱. گالری تصاویر - تغییر تصویر اصلی
  // ========================================
  const thumbnails = document.querySelectorAll('.thumbnail-item');
  const mainImage = document.getElementById('mainImage');
  
  thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function() {
      // حذف active از همه
      thumbnails.forEach(t => t.classList.remove('active'));
      // اضافه کردن active به کلیک‌شده
      this.classList.add('active');
      
      // تغییر تصویر اصلی (در اینجا فقط افکت)
      const index = this.getAttribute('data-index');
      console.log('تصویر انتخاب شد:', index);
      
      // افکت fade
      mainImage.style.opacity = '0.5';
      setTimeout(() => {
        mainImage.style.opacity = '1';
      }, 200);
    });
  });
  
  // ========================================
  // . تب‌های توضیحات
  // ========================================
  const tabButtons = document.querySelectorAll('.tab-button');
  const tabPanes = document.querySelectorAll('.tab-pane');
  
  tabButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      const targetTab = this.getAttribute('data-tab');
      
      // حذف active از همه
      tabButtons.forEach(b => b.classList.remove('active'));
      tabPanes.forEach(p => p.classList.remove('active'));
      
      // اضافه کردن active
      this.classList.add('active');
      document.getElementById('tab-' + targetTab).classList.add('active');
    });
  });
  
  // ========================================
  // . دکمه افزودن به سبد خرید
  // ========================================
  const addToCartBtn = document.getElementById('addToCartBtn');
  
  if (addToCartBtn) {
    addToCartBtn.addEventListener('click', function() {
      const originalText = this.querySelector('.btn-text').textContent;
      const originalIcon = this.querySelector('.btn-icon').textContent;
      
      this.querySelector('.btn-text').textContent = 'اضافه شد! ✓';
      this.querySelector('.btn-icon').textContent = '✅';
      this.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
      
      setTimeout(() => {
        this.querySelector('.btn-text').textContent = originalText;
        this.querySelector('.btn-icon').textContent = originalIcon;
        this.style.background = '';
      }, 2000);
    });
  }
  
  // ========================================
  // ۴. دکمه خرید فوری
  // ========================================
  const buyNowBtn = document.querySelector('.btn-buy-now');
  
  if (buyNowBtn) {
    buyNowBtn.addEventListener('click', function() {
      alert('در حال انتقال به درگاه پرداخت... 💳');
      // window.location.href = 'checkout.html';
    });
  }
  
  // ========================================
  // ۵. فرم ثبت نظر
  // ========================================
  const reviewForm = document.querySelector('.review-form');
  
  if (reviewForm) {
    reviewForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const name = document.getElementById('reviewName').value;
      const text = document.getElementById('reviewText').value;
      const rating = document.querySelector('input[name="rating"]:checked');
      
      if (!name || !text || !rating) {
        alert('لطفاً همه فیلدها را پر کنید! ⚠️');
        return;
      }
      
      alert('نظر شما با موفقیت ثبت شد! ممنون از شما 🙏');
      reviewForm.reset();
    });
  }
  
  // ========================================
  // ۶. دکمه مفید بود (نظرات)
  // ========================================
  document.querySelectorAll('.btn-helpful').forEach(btn => {
    btn.addEventListener('click', function() {
      const text = this.textContent;
      const match = text.match(/\d+/);
      if (match) {
        const count = parseInt(match[0]) + 1;
        this.textContent = `👍 مفید بود (${count})`;
        this.style.background = 'var(--color-blue-bg)';
        this.style.borderColor = 'var(--color-blue)';
        this.style.color = 'var(--color-blue)';
      }
    });
  });
  
  // ========================================
  // ۷. دکمه کپی لینک
  // ========================================
  const copyLinkBtn = document.querySelector('.share-btn.copy-link');
  
  if (copyLinkBtn) {
    copyLinkBtn.addEventListener('click', function(e) {
      e.preventDefault();
      navigator.clipboard.writeText(window.location.href).then(() => {
        alert('لینک کپی شد! 📋');
      });
    });
  }
  
  // ========================================
  // ۸. اسلایدر محصولات مرتبط
  // ========================================
  if (document.querySelector('.relatedSwiper')) {
    new Swiper('.relatedSwiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      breakpoints: {
        576: { slidesPerView: 2, spaceBetween: 15 },
        768: { slidesPerView: 3, spaceBetween: 20 },
        1024: { slidesPerView: 4, spaceBetween: 25 },
      },
      navigation: {
        nextEl: '.relatedSwiper .swiper-button-next',
        prevEl: '.relatedSwiper .swiper-button-prev',
      },
      pagination: {
        el: '.relatedSwiper .swiper-pagination',
        clickable: true,
      },
      loop: true,
      speed: 600,
      grabCursor: true,
    });
  }
  
  // ========================================
  // . مگا منو (همان کد قبلی)
  // ========================================
  const newHamburgerBtn = document.getElementById('newHamburgerBtn');
  const newMegaMenuNav = document.getElementById('newMegaMenuNav');
  const newMegaOverlay = document.getElementById('newMegaOverlay');
  const newMegamenuItems = document.querySelectorAll('.new-mega-item.has-megamenu');
  
  if (newHamburgerBtn && newMegaMenuNav) {
    newHamburgerBtn.addEventListener('click', function() {
      this.classList.toggle('active');
      newMegaMenuNav.classList.toggle('active');
      if (newMegaOverlay) newMegaOverlay.classList.toggle('active');
      document.body.style.overflow = newMegaMenuNav.classList.contains('active') ? 'hidden' : '';
    });
    
    if (newMegaOverlay) {
      newMegaOverlay.addEventListener('click', function() {
        newHamburgerBtn.classList.remove('active');
        newMegaMenuNav.classList.remove('active');
        this.classList.remove('active');
        document.body.style.overflow = '';
      });
    }
    
    newMegamenuItems.forEach(item => {
      const link = item.querySelector('.new-mega-link');
      link.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
          e.preventDefault();
          newMegamenuItems.forEach(other => {
            if (other !== item) other.classList.remove('active');
          });
          item.classList.toggle('active');
        }
      });
    });
  }
  
});