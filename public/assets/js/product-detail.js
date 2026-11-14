document.addEventListener('DOMContentLoaded', function() {
  
  // ========================================
  // ۱. مگا منو - موبایل
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
    
    window.addEventListener('resize', function() {
      if (window.innerWidth > 768) {
        newHamburgerBtn.classList.remove('active');
        newMegaMenuNav.classList.remove('active');
        if (newMegaOverlay) newMegaOverlay.classList.remove('active');
        document.body.style.overflow = '';
        newMegamenuItems.forEach(item => item.classList.remove('active'));
      }
    });
  }
  
  // ========================================
  // ۲. گالری تصاویر - تغییر تصویر اصلی
  // ========================================
  const thumbnails = document.querySelectorAll('.thumbnail-item');
  const mainImage = document.getElementById('mainImage');
  
  if (thumbnails.length > 0 && mainImage) {
    thumbnails.forEach(thumb => {
      thumb.addEventListener('click', function() {
        thumbnails.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
        const index = this.getAttribute('data-index');
        console.log('تصویر انتخاب شد:', index);
        
        // افکت fade
        mainImage.style.transition = 'opacity 0.3s';
        mainImage.style.opacity = '0.5';
        setTimeout(() => {
          mainImage.style.opacity = '1';
        }, 300);
      });
    });
  }
  
  // ========================================
  // ۳. تب‌های توضیحات
  // ========================================
  const tabButtons = document.querySelectorAll('.tab-button');
  const tabPanes = document.querySelectorAll('.tab-pane');
  
  tabButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      const targetTab = this.getAttribute('data-tab');
      
      tabButtons.forEach(b => b.classList.remove('active'));
      tabPanes.forEach(p => p.classList.remove('active'));
      
      this.classList.add('active');
      const targetPane = document.getElementById('tab-' + targetTab);
      if (targetPane) {
        targetPane.classList.add('active');
      }
    });
  });
  
  // ========================================
  // ۴. دکمه افزودن به سبد خرید
  // ========================================
  const addToCartBtn = document.getElementById('addToCartBtn');
  
  if (addToCartBtn) {
    addToCartBtn.addEventListener('click', function() {
      const btnText = this.querySelector('.btn-text');
      const btnIcon = this.querySelector('.btn-icon');
      const originalText = btnText.textContent;
      const originalIcon = btnIcon.textContent;
      
      btnText.textContent = 'اضافه شد! ✓';
      btnIcon.textContent = '✅';
      this.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
      
      setTimeout(() => {
        btnText.textContent = originalText;
        btnIcon.textContent = originalIcon;
        this.style.background = '';
      }, 2000);
    });
  }
  
  // ========================================
  // ۵. دکمه خرید فوری
  // ========================================
  const buyNowBtn = document.querySelector('.btn-buy-now');
  
  if (buyNowBtn) {
    buyNowBtn.addEventListener('click', function() {
      alert('در حال انتقال به درگاه پرداخت... 💳');
    });
  }
  
  // ========================================
  // ۶. فرم ثبت نظر
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
  // . دکمه مفید بود (نظرات)
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
  // ۸. دکمه کپی لینک
  // ========================================
  const copyLinkBtn = document.querySelector('.share-btn.copy-link');
  
  if (copyLinkBtn) {
    copyLinkBtn.addEventListener('click', function(e) {
      e.preventDefault();
      navigator.clipboard.writeText(window.location.href).then(() => {
        alert('لینک کپی شد! 📋');
      }).catch(() => {
        alert('کپی لینک با موفقیت انجام شد! 📋');
      });
    });
  }
  
  // ========================================
  // ۹. اسلایدر محصولات مرتبط
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
  
});






  // ========================================
  // ۱۰. محصولات مرتبط - تعاملات
  // ========================================
  
  // دکمه علاقه‌مندی
  document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      this.classList.toggle('active');
      
      if (this.classList.contains('active')) {
        this.textContent = '❤️';
        this.style.transform = 'scale(1.3)';
        setTimeout(() => {
          this.style.transform = '';
        }, 300);
      } else {
        this.textContent = '🤍';
      }
    });
  });
  
  // دکمه مشاهده سریع
  document.querySelectorAll('.quick-view-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      alert('👁️ پنجره مشاهده سریع باز می‌شود...');
    });
  });
  
  // دکمه افزودن به سبد
  document.querySelectorAll('.add-cart-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      
      const cartIcon = this.querySelector('.cart-icon');
      const cartText = this.querySelector('.cart-text');
      const originalIcon = cartIcon.textContent;
      const originalText = cartText.textContent;
      
      this.classList.add('added');
      cartIcon.textContent = '✅';
      cartText.textContent = 'اضافه شد';
      
      setTimeout(() => {
        this.classList.remove('added');
        cartIcon.textContent = originalIcon;
        cartText.textContent = originalText;
      }, 2000);
    });
  


              // ========================================
  // ۱۱. گالری حرفه‌ای - تغییر تصویر
  // ========================================
  const proThumbnails = document.querySelectorAll('.pro-thumb');
  const mainShowcase = document.getElementById('mainShowcase');
  
  if (proThumbnails.length > 0 && mainShowcase) {
    proThumbnails.forEach(thumb => {
      thumb.addEventListener('click', function() {
        proThumbnails.forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        
        const index = this.getAttribute('data-index');
        console.log('تصویر انتخاب شد:', index);
        
        // افکت fade
        mainShowcase.style.transition = 'opacity 0.3s';
        mainShowcase.style.opacity = '0.5';
        setTimeout(() => {
          mainShowcase.style.opacity = '1';
        }, 300);
      });
    });
  }


      // ========================================
  // ۱۲. سیستم نظرات حرفه‌ای
  // ========================================
  
  // فیلتر نظرات
  const filterBtns = document.querySelectorAll('.filter-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      const filter = this.getAttribute('data-filter');
      console.log('فیلتر اعمال شد:', filter);
      
      // اینجا می‌توانی منطق فیلتر را اضافه کنی
      // مثلاً نمایش فقط نظرات مثبت یا منفی
    });
  });
  
  // مرتب‌سازی نظرات
  const sortSelect = document.getElementById('sortReviews');
  if (sortSelect) {
    sortSelect.addEventListener('change', function() {
      const sortType = this.value;
      console.log('مرتب‌سازی:', sortType);
      
      // اینجا می‌توانی منطق مرتب‌سازی را اضافه کنی
    });
  }
  
  // دکمه مفید بود
  document.querySelectorAll('.helpful-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      if (this.classList.contains('active')) return;
      
      this.classList.add('active');
      const countSpan = this.querySelector('.action-count');
      if (countSpan) {
        const currentCount = parseInt(countSpan.textContent.match(/\d+/)[0]);
        const newCount = currentCount + 1;
        countSpan.textContent = `(${newCount})`;
      }
      
      // افکت
      this.style.transform = 'scale(1.1)';
      setTimeout(() => {
        this.style.transform = '';
      }, 200);
    });
  });
  
  // دکمه پاسخ - نمایش فرم پاسخ
  document.querySelectorAll('.reply-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const level = parseInt(this.getAttribute('data-level'));
      const parentId = this.getAttribute('data-parent-id');
      
      // اگر سطح ۳ است، اجازه پاسخ نده
      if (level >= 3) {
        alert('حداکثر تا ۳ سطح می‌توانید پاسخ دهید! 📝');
        return;
      }
      
      // بررسی وجود فرم پاسخ قبلی
      const existingForm = document.querySelector('.reply-form-container');
      if (existingForm) {
        existingForm.remove();
      }
      
      // ایجاد فرم پاسخ
      const replyFormHTML = `
        <div class="reply-form-container" data-parent-id="${parentId}" data-level="${level}">
          <div class="reply-form-header">
            <span class="reply-form-title">💬 پاسخ به نظر</span>
            <button class="close-reply-form" onclick="this.closest('.reply-form-container').remove()">✕</button>
          </div>
          <form class="reply-form" onsubmit="submitReply(event, '${parentId}', ${level})">
            <textarea placeholder="پاسخ خود را بنویسید..." required></textarea>
            <div class="reply-form-actions">
              <button type="button" class="cancel-reply-btn" onclick="this.closest('.reply-form-container').remove()">انصراف</button>
              <button type="submit" class="submit-reply-btn"> ارسال پاسخ</button>
            </div>
          </form>
        </div>
      `;
      
      // اضافه کردن فرم بعد از کارت نظر
      const reviewCard = this.closest('.review-card');
      reviewCard.insertAdjacentHTML('afterend', replyFormHTML);
      
      // فوکوس روی textarea
      const textarea = reviewCard.nextElementSibling.querySelector('textarea');
      if (textarea) {
        textarea.focus();
      }
    });
  });
  
  // ارسال پاسخ
  window.submitReply = function(event, parentId, level) {
    event.preventDefault();
    
    const formContainer = event.target.closest('.reply-form-container');
    const textarea = formContainer.querySelector('textarea');
    const replyText = textarea.value.trim();
    
    if (!replyText) {
      alert('لطفاً متن پاسخ را وارد کنید! ⚠️');
      return;
    }
    
    // ایجاد پاسخ جدید
    const newReplyHTML = `
      <div class="review-thread-item reply-item" data-review-id="${parentId}-${Date.now()}">
        <div class="review-card reply-card">
          <div class="reply-connector"></div>
          <div class="review-header">
            <div class="reviewer-profile">
              <div class="reviewer-avatar" style="background: linear-gradient(135deg, #1d4ed8, #3b82f6);">ش</div>
              <div class="reviewer-info">
                <div class="reviewer-name">شما</div>
                <div class="reviewer-meta">
                  <span class="review-date">همین الان</span>
                </div>
              </div>
            </div>
          </div>
          <div class="review-body">
            <p>${replyText}</p>
          </div>
          <div class="review-footer">
            <div class="review-actions">
              <button class="action-btn helpful-btn" data-count="0">
                <span class="action-icon">👍</span>
                <span class="action-text">مفید بود</span>
                <span class="action-count">()</span>
              </button>
              ${level < 2 ? `
              <button class="action-btn reply-btn" data-level="${level + 1}" data-parent-id="${parentId}-${Date.now()}">
                <span class="action-icon">💬</span>
                <span class="action-text">پاسخ</span>
              </button>
              ` : ''}
            </div>
          </div>
        </div>
      </div>
    `;
    
    // پیدا کردن کانتینر پاسخ‌ها
    const reviewCard = formContainer.previousElementSibling;
    let repliesContainer = reviewCard.nextElementSibling;
    
    if (!repliesContainer || !repliesContainer.classList.contains('replies-container')) {
      // اگر کانتینر پاسخ وجود ندارد، ایجاد کن
      const levelClass = level === 1 ? 'level-1' : level === 2 ? 'level-2' : 'level-3';
      const containerHTML = `<div class="replies-container ${levelClass}">${newReplyHTML}</div>`;
      reviewCard.insertAdjacentHTML('afterend', containerHTML);
    } else {
      repliesContainer.insertAdjacentHTML('beforeend', newReplyHTML);
    }
    
    // حذف فرم پاسخ
    formContainer.remove();
    
    // نمایش پیام موفقیت
    alert('پاسخ شما با موفقیت ثبت شد! ✅');
    
    // اضافه کردن event listener به دکمه‌های جدید
    attachNewReplyEvents();
  };
  
  // اضافه کردن event listener به دکمه‌های جدید
  function attachNewReplyEvents() {
    document.querySelectorAll('.helpful-btn:not(.attached)').forEach(btn => {
      btn.classList.add('attached');
      btn.addEventListener('click', function() {
        if (this.classList.contains('active')) return;
        
        this.classList.add('active');
        const countSpan = this.querySelector('.action-count');
        if (countSpan) {
          const currentCount = parseInt(countSpan.textContent.match(/\d+/)[0]);
          const newCount = currentCount + 1;
          countSpan.textContent = `(${newCount})`;
        }
      });
    });
    
    document.querySelectorAll('.reply-btn:not(.attached)').forEach(btn => {
      btn.classList.add('attached');
      btn.addEventListener('click', function() {
        const level = parseInt(this.getAttribute('data-level'));
        const parentId = this.getAttribute('data-parent-id');
        
        if (level >= 3) {
          alert('حداکثر تا ۳ سطح می‌توانید پاسخ دهید! 📝');
          return;
        }
        
        const existingForm = document.querySelector('.reply-form-container');
        if (existingForm) {
          existingForm.remove();
        }
        
        const replyFormHTML = `
          <div class="reply-form-container" data-parent-id="${parentId}" data-level="${level}">
            <div class="reply-form-header">
              <span class="reply-form-title">💬 پاسخ به نظر</span>
              <button class="close-reply-form" onclick="this.closest('.reply-form-container').remove()">✕</button>
            </div>
            <form class="reply-form" onsubmit="submitReply(event, '${parentId}', ${level})">
              <textarea placeholder="پاسخ خود را بنویسید..." required></textarea>
              <div class="reply-form-actions">
                <button type="button" class="cancel-reply-btn" onclick="this.closest('.reply-form-container').remove()">انصراف</button>
                <button type="submit" class="submit-reply-btn">📤 ارسال پاسخ</button>
              </div>
            </form>
          </div>
        `;
        
        const reviewCard = this.closest('.review-card');
        reviewCard.insertAdjacentHTML('afterend', replyFormHTML);
        
        const textarea = reviewCard.nextElementSibling.querySelector('textarea');
        if (textarea) {
          textarea.focus();
        }
      });
    });
  }
  
  // فرم ثبت نظر اصلی
  const mainReviewForm = document.getElementById('mainReviewForm');
  if (mainReviewForm) {
    mainReviewForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const name = document.getElementById('reviewerName').value;
      const title = document.getElementById('reviewTitle').value;
      const text = document.getElementById('reviewText').value;
      const rating = document.querySelector('input[name="rating"]:checked');
      
      if (!name || !title || !text || !rating) {
        alert('لطفاً همه فیلدها را پر کنید! ⚠️');
        return;
      }
      
      alert('نظر شما با موفقیت ثبت شد و پس از تایید نمایش داده خواهد شد! ✅');
      this.reset();
    });
  }
  
  // صفحه‌بندی نظرات
  document.querySelectorAll('.page-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.page-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      console.log('صفحه:', this.textContent);
      // اینجا می‌توانی منطق صفحه‌بندی را اضافه کنی
    });
  });
  
  // اجرای اولیه attachNewReplyEvents
  attachNewReplyEvents();






});