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
  // ۲. دکمه علاقه‌مندی
  // ========================================
  document.querySelectorAll('.wishlist-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      this.classList.toggle('active');
      
      if (this.classList.contains('active')) {
        this.querySelector('.action-icon').textContent = '❤️';
      } else {
        this.querySelector('.action-icon').textContent = '🤍';
      }
    });
  });













  // ========================================
  // ۰. اسلایدر محصولات پیشنهادی حرفه‌ای
  // ========================================
  if (document.querySelector('.suggestedProSwiper')) {
    const suggestedSwiper = new Swiper('.suggestedProSwiper', {
      slidesPerView: 1,
      spaceBetween: 20,
      breakpoints: {
        576: { slidesPerView: 2, spaceBetween: 15 },
        768: { slidesPerView: 3, spaceBetween: 20 },
        1024: { slidesPerView: 4, spaceBetween: 25 },
      },
      navigation: {
        nextEl: '.suggestedProSwiper .swiper-button-next',
        prevEl: '.suggestedProSwiper .swiper-button-prev',
      },
      pagination: {
        el: '.suggestedProSwiper .swiper-pagination',
        clickable: true,
        dynamicBullets: true,
      },
      loop: true,
      speed: 600,
      grabCursor: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
    });
  }
  
  // ========================================
  // ۱. تعاملات کارت‌های پیشنهادی
  // ========================================
  
  // دکمه علاقه‌مندی
  document.querySelectorAll('.suggested-pro-card .wishlist-btn').forEach(btn => {
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
  document.querySelectorAll('.suggested-pro-card .quick-view').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      alert('👁️ پنجره مشاهده سریع باز می‌شود...');
    });
  });
  
  // دکمه افزودن به سبد
  document.querySelectorAll('.suggested-pro-card .add-cart-btn').forEach(btn => {
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
  });
















  
});

// ========================================
// ۳. به‌روزرسانی تعداد
// ========================================
function updateQuantity(productId, change) {
  const item = document.querySelector(`[data-product-id="${productId}"]`);
  const input = item.querySelector('.qty-input');
  let value = parseInt(input.value) + change;
  
  if (value < 1) value = 1;
  if (value > 10) value = 10;
  
  input.value = value;
  updateCartTotals();
}

// ========================================
// ۴. حذف آیتم
// ========================================
function removeItem(productId) {
  const item = document.querySelector(`[data-product-id="${productId}"]`);
  
  if (confirm('آیا مطمئن هستید که می‌خواهید این محصول را حذف کنید؟')) {
    item.style.transition = 'all 0.3s';
    item.style.opacity = '0';
    item.style.transform = 'translateX(50px)';
    
    setTimeout(() => {
      item.remove();
      updateCartTotals();
      
      // بررسی خالی بودن سبد
      const remainingItems = document.querySelectorAll('.cart-item');
      if (remainingItems.length === 0) {
        showEmptyCart();
      }
    }, 300);
  }
}

// ========================================
// ۵. به‌روزرسانی جمع کل
// ========================================
function updateCartTotals() {
  const items = document.querySelectorAll('.cart-item');
  let subtotal = 0;
  
  items.forEach(item => {
    const priceText = item.querySelector('.price-current').textContent;
    const price = parseInt(priceText.replace(/[^\d]/g, ''));
    const quantity = parseInt(item.querySelector('.qty-input').value);
    subtotal += price * quantity;
  });
  
  const tax = Math.round(subtotal * 0.09);
  const total = subtotal + tax;
  
  document.getElementById('subtotal').textContent = subtotal.toLocaleString('fa-IR') + ' تومان';
  document.getElementById('tax').textContent = tax.toLocaleString('fa-IR') + ' تومان';
  document.getElementById('totalAmount').textContent = total.toLocaleString('fa-IR') + ' تومان';
  
  // به‌روزرسانی badge سبد خرید
  const cartBadge = document.querySelector('.cart-badge');
  if (cartBadge) {
    cartBadge.textContent = items.length.toLocaleString('fa-IR');
  }
}

// ========================================
// ۶. اعمال کد تخفیف
// ========================================
function applyDiscount() {
  const code = document.getElementById('discountCode').value.trim();
  const message = document.getElementById('discountMessage');
  const discountRow = document.getElementById('discountRow');
  const discountAmount = document.getElementById('discountAmount');
  
  if (!code) {
    message.textContent = '⚠️ لطفاً کد تخفیف را وارد کنید';
    message.className = 'discount-message error';
    return;
  }
  
  // کدهای تخفیف نمونه
  const validCodes = {
    'ALMAS20': 20,
    'WELCOME10': 10,
    'SPECIAL30': 30
  };
  
  if (validCodes[code]) {
    const discount = validCodes[code];
    const subtotal = parseInt(document.getElementById('subtotal').textContent.replace(/[^\d]/g, ''));
    const discountValue = Math.round(subtotal * discount / 100);
    
    discountAmount.textContent = '-' + discountValue.toLocaleString('fa-IR') + ' تومان';
    discountRow.style.display = 'flex';
    
    message.textContent = `✅ کد تخفیف ${discount}٪ با موفقیت اعمال شد`;
    message.className = 'discount-message success';
    
    // به‌روزرسانی جمع کل
    updateCartTotals();
  } else {
    message.textContent = '❌ کد تخفیف نامعتبر است';
    message.className = 'discount-message error';
    discountRow.style.display = 'none';
  }
}

// ========================================
// ۷. تسویه حساب
// ========================================
function proceedToCheckout() {
  const items = document.querySelectorAll('.cart-item');
  
  if (items.length === 0) {
    alert('سبد خرید شما خالی است! 🛒');
    return;
  }
  
  alert('در حال انتقال به صفحه تسویه حساب... 💳');
  // window.location.href = 'checkout.html';
}

// ========================================
// . افزودن به سبد خرید (محصولات پیشنهادی)
// ========================================
function addToCart(productId) {
  alert('محصول به سبد خرید اضافه شد! 🛒');
  // اینجا می‌توانی منطق اضافه کردن به سبد را پیاده‌سازی کنی
}

// ========================================
// ۹. نمایش سبد خالی
// ========================================
function showEmptyCart() {
  const container = document.querySelector('.cart-items-container');
  container.innerHTML = `
    <div class="empty-cart-message">
      <div class="empty-icon"></div>
      <h3>سبد خرید شما خالی است</h3>
      <p>برای مشاهده محصولات به فروشگاه بروید</p>
      <a href="products.html" class="empty-cart-btn">
        <span class="btn-icon">🛍️</span>
        <span>مشاهده محصولات</span>
      </a>
    </div>
  `;
  
  // اضافه کردن استایل
  const style = document.createElement('style');
  style.textContent = `
    .empty-cart-message {
      text-align: center;
      padding: 60px 20px;
      background: var(--color-white);
      border-radius: 24px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    }
    
    .empty-icon {
      font-size: 5rem;
      margin-bottom: 20px;
      opacity: 0.3;
    }
    
    .empty-cart-message h3 {
      font-size: 1.8rem;
      font-weight: 900;
      color: var(--color-blue-dark);
      margin: 0 0 10px 0;
    }
    
    .empty-cart-message p {
      font-size: 1.1rem;
      color: var(--color-text-light);
      margin: 0 0 30px 0;
    }
    
    .empty-cart-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 14px 32px;
      background: linear-gradient(135deg, var(--color-blue) 0%, var(--color-blue-dark) 100%);
      color: white;
      text-decoration: none;
      border-radius: 50px;
      font-weight: 700;
      font-size: 1rem;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(29, 78, 216, 0.3);
    }
    
    .empty-cart-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 25px rgba(29, 78, 216, 0.5);
    }
  `;
  document.head.appendChild(style);
}






