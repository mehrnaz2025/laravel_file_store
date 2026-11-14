// ========================================
// داده‌های نمونه محصولات
// ========================================
const productsData = [
  {
    id: 1,
    title: 'دوره جامع آموزش فتوشاپ ۲۰۲',
    category: 'video',
    subcategory: 'tutorial',
    format: 'mp4',
    price: 250000,
    oldPrice: 350000,
    rating: 5,
    sales: 350,
    image: 'https://via.placeholder.com/400x300/1e40af/ffffff?text=Photoshop',
    badge: 'پرفروش',
    badgeType: 'hot'
  },
  {
    id: 2,
    title: 'کتاب آموزش برنامه‌نویسی پایتون',
    category: 'pdf',
    subcategory: 'tutorial',
    format: 'pdf',
    price: 95000,
    oldPrice: null,
    rating: 5,
    sales: 280,
    image: 'https://via.placeholder.com/400x300/2563eb/ffffff?text=Python',
    badge: 'جدید',
    badgeType: 'new'
  },
  {
    id: 3,
    title: 'پادکست مدیریت زمان و بهره‌وری',
    category: 'audio',
    subcategory: 'podcast',
    format: 'mp3',
    price: 45000,
    oldPrice: null,
    rating: 5,
    sales: 420,
    image: 'https://via.placeholder.com/400x300/f0707a/ffffff?text=Podcast',
    badge: null,
    badgeType: null
  },
  {
    id: 4,
    title: 'دوره تخصصی طراحی UI/UX با فیگما',
    category: 'video',
    subcategory: 'tutorial',
    format: 'mp4',
    price: 280000,
    oldPrice: 380000,
    rating: 5,
    sales: 195,
    image: 'https://via.placeholder.com/400x300/3b82f6/ffffff?text=UI+UX',
    badge: 'تخفیف',
    badgeType: 'hot'
  },
  {
    id: 5,
    title: 'کتاب صوتی عادت‌های اتمی',
    category: 'audio',
    subcategory: 'audiobook',
    format: 'mp3',
    price: 85000,
    oldPrice: null,
    rating: 5,
    sales: 510,
    image: 'https://via.placeholder.com/400x300/1e40af/ffffff?text=Audiobook',
    badge: 'پرفروش',
    badgeType: 'hot'
  },
  {
    id: 6,
    title: 'مجموعه مدیتیشن آرامش درون',
    category: 'audio',
    subcategory: 'meditation',
    format: 'mp3',
    price: 35000,
    oldPrice: 50000,
    rating: 4,
    sales: 230,
    image: 'https://via.placeholder.com/400x300/f0707a/ffffff?text=Meditation',
    badge: null,
    badgeType: null
  },
  {
    id: 7,
    title: 'آموزش عکاسی حرفه‌ای',
    category: 'video',
    subcategory: 'tutorial',
    format: 'mp4',
    price: 180000,
    oldPrice: null,
    rating: 4,
    sales: 145,
    image: 'https://via.placeholder.com/400x300/2563eb/ffffff?text=Photography',
    badge: null,
    badgeType: null
  },
  {
    id: 8,
    title: 'رمان بادی که در باد رفت',
    category: 'pdf',
    subcategory: 'tutorial',
    format: 'pdf',
    price: 65000,
    oldPrice: null,
    rating: 5,
    sales: 380,
    image: 'https://via.placeholder.com/400x300/f0707a/ffffff?text=Novel',
    badge: 'پرفروش',
    badgeType: 'hot'
  },
  {
    id: 9,
    title: 'مجموعه موسیقی کلاسیک پیانو',
    category: 'audio',
    subcategory: 'music',
    format: 'mp3',
    price: 60000,
    oldPrice: null,
    rating: 4,
    sales: 175,
    image: 'https://via.placeholder.com/400x300/3b82f6/ffffff?text=Music',
    badge: null,
    badgeType: null
  },
  {
    id: 10,
    title: 'دوره جامع React و Next.js',
    category: 'video',
    subcategory: 'tutorial',
    format: 'mp4',
    price: 450000,
    oldPrice: 600000,
    rating: 5,
    sales: 290,
    image: 'https://via.placeholder.com/400x300/1e40af/ffffff?text=React',
    badge: 'تخفیف',
    badgeType: 'hot'
  },
  {
    id: 11,
    title: 'جزوه کامل ریاضی مهندسی',
    category: 'pdf',
    subcategory: 'tutorial',
    format: 'pdf',
    price: 45000,
    oldPrice: null,
    rating: 4,
    sales: 220,
    image: 'https://via.placeholder.com/400x300/2563eb/ffffff?text=Math',
    badge: null,
    badgeType: null
  },
  {
    id: 12,
    title: 'آموزش زبان انگلیسی با پادکست',
    category: 'audio',
    subcategory: 'tutorial',
    format: 'mp3',
    price: 120000,
    oldPrice: null,
    rating: 5,
    sales: 340,
    image: 'https://via.placeholder.com/400x300/f0707a/ffffff?text=English',
    badge: 'جدید',
    badgeType: 'new'
  }
];

// ========================================
// متغیرهای سراسری
// ========================================
let filteredProducts = [...productsData];
let currentView = 'grid';

// ========================================
// تبدیل عدد به فارسی
// ========================================
function toPersianNum(num) {
  const persianDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
  return String(num).replace(/\d/g, function(d) {
    return persianDigits[d];
  });
}

function formatPrice(price) {
  return toPersianNum(price.toLocaleString('en-US'));
}

// ========================================
// نمایش محصولات
// ========================================
function renderProducts(products) {
  const grid = document.getElementById('productsGrid');
  const emptyResults = document.getElementById('emptyResults');
  const showingCount = document.getElementById('showingCount');
  
  if (products.length === 0) {
    grid.style.display = 'none';
    emptyResults.style.display = 'block';
    showingCount.textContent = '۰';
    return;
  }
  
  grid.style.display = 'grid';
  emptyResults.style.display = 'none';
  showingCount.textContent = toPersianNum(products.length);
  
  grid.innerHTML = products.map(product => {
    const categoryNames = {
      audio: '🎵 فایل صوتی',
      video: '🎬 فایل تصویری',
      pdf: '📄 فایل PDF'
    };
    
    const badgeHTML = product.badge 
      ? `<span class="product-badge ${product.badgeType}">${product.badge}</span>` 
      : '';
    
    const oldPriceHTML = product.oldPrice 
      ? `<span class="old-price">${formatPrice(product.oldPrice)}</span>` 
      : '';
    
    const stars = '⭐'.repeat(product.rating);
    
    return `
      <div class="product-card" data-category="${product.category}" data-price="${product.price}" data-rating="${product.rating}">
        <div class="product-image">
          ${badgeHTML}
          <img src="${product.image}" alt="${product.title}" loading="lazy">
          <div class="product-overlay">
            <a href="product-detail.html?id=${product.id}" class="product-quick-view">مشاهده سریع</a>
          </div>
        </div>
        <div class="product-info">
          <div class="product-category">${categoryNames[product.category]}</div>
          <h3 class="product-title">${product.title}</h3>
          <div class="product-meta">
            <span class="product-rating">${stars} ${toPersianNum(product.rating)}</span>
            <span class="product-sales">${toPersianNum(product.sales)} فروش</span>
          </div>
          <div class="product-footer">
            <div class="product-price">
              ${oldPriceHTML}
              ${formatPrice(product.price)} <small>تومان</small>
            </div>
            <button class="btn-add-cart" onclick="addToCart(${product.id})">افزودن</button>
          </div>
        </div>
      </div>
    `;
  }).join('');
}

// ========================================
// اعمال فیلترها
// ========================================
function applyFilters() {
  const selectedCategories = Array.from(document.querySelectorAll('.filter-category:checked')).map(el => el.value);
  const selectedSubcategories = Array.from(document.querySelectorAll('.filter-subcategory:checked')).map(el => el.value);
  const selectedRatings = Array.from(document.querySelectorAll('.filter-rating:checked')).map(el => parseInt(el.value));
  const selectedFormats = Array.from(document.querySelectorAll('.filter-format:checked')).map(el => el.value);
  const maxPrice = parseInt(document.getElementById('priceRange').value);
  const searchText = document.getElementById('productSearchInput').value.toLowerCase();
  const sortBy = document.getElementById('sortBy').value;
  
  filteredProducts = productsData.filter(product => {
    const categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(product.category);
    const subcategoryMatch = selectedSubcategories.length === 0 || selectedSubcategories.includes(product.subcategory);
    const ratingMatch = selectedRatings.length === 0 || selectedRatings.some(r => product.rating >= r);
    const formatMatch = selectedFormats.length === 0 || selectedFormats.includes(product.format);
    const priceMatch = product.price <= maxPrice;
    const searchMatch = searchText === '' || product.title.toLowerCase().includes(searchText);
    
    return categoryMatch && subcategoryMatch && ratingMatch && formatMatch && priceMatch && searchMatch;
  });
  
  // مرتب‌سازی
  switch(sortBy) {
    case 'price-low':
      filteredProducts.sort((a, b) => a.price - b.price);
      break;
    case 'price-high':
      filteredProducts.sort((a, b) => b.price - a.price);
      break;
    case 'rating':
      filteredProducts.sort((a, b) => b.rating - a.rating);
      break;
    case 'bestselling':
      filteredProducts.sort((a, b) => b.sales - a.sales);
      break;
    case 'newest':
    default:
      filteredProducts.sort((a, b) => b.id - a.id);
  }
  
  renderProducts(filteredProducts);
}

// ========================================
// افزودن به سبد خرید
// ========================================
function addToCart(productId) {
  const product = productsData.find(p => p.id === productId);
  if (product) {
    // افکت دکمه
    event.target.textContent = '✓ اضافه شد';
    event.target.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';
    
    setTimeout(() => {
      event.target.textContent = 'افزودن';
      event.target.style.background = '';
    }, 1500);
    
    console.log('محصول به سبد خرید اضافه شد:', product.title);
  }
}

// ========================================
// راه‌اندازی Event Listeners
// ========================================
document.addEventListener('DOMContentLoaded', function() {
  
  // رندر اولیه
  renderProducts(productsData);
  
  // فیلتر دسته‌بندی
  document.querySelectorAll('.filter-category, .filter-subcategory, .filter-rating, .filter-format').forEach(checkbox => {
    checkbox.addEventListener('change', applyFilters);
  });
  
  // فیلتر قیمت
  const priceRange = document.getElementById('priceRange');
  const priceMaxDisplay = document.getElementById('priceMaxDisplay');
  
  priceRange.addEventListener('input', function() {
    priceMaxDisplay.textContent = formatPrice(this.value);
    applyFilters();
  });
  
  // جستجو
  document.getElementById('productSearchInput').addEventListener('input', function() {
    applyFilters();
  });
  
  // مرتب‌سازی
  document.getElementById('sortBy').addEventListener('change', applyFilters);
  
  // پاک کردن همه فیلترها
  document.getElementById('resetAllFilters').addEventListener('click', function() {
    document.querySelectorAll('.filter-category, .filter-subcategory, .filter-rating, .filter-format').forEach(cb => {
      cb.checked = false;
    });
    priceRange.value = 500000;
    priceMaxDisplay.textContent = formatPrice(500000);
    document.getElementById('productSearchInput').value = '';
    document.getElementById('sortBy').value = 'newest';
    applyFilters();
  });
  
  // پاک کردن جستجو
  document.getElementById('resetSearch').addEventListener('click', function() {
    document.getElementById('productSearchInput').value = '';
    applyFilters();
  });
  
  // تغییر نمایش (گرید/لیست)
  document.querySelectorAll('.view-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      
      const view = this.dataset.view;
      const grid = document.getElementById('productsGrid');
      
      if (view === 'list') {
        grid.classList.add('list-view');
      } else {
        grid.classList.remove('list-view');
      }
    });
  });
  
  // باز/بسته کردن گروه‌های فیلتر
  document.querySelectorAll('.filter-title').forEach(title => {
    title.addEventListener('click', function() {
      this.parentElement.classList.toggle('collapsed');
    });
  });
  
  // فیلتر موبایل
  const filterToggleMobile = document.getElementById('filterToggleMobile');
  const filterSidebar = document.querySelector('.filter-sidebar');
  const applyFilterMobile = document.getElementById('applyFilterMobile');
  
  if (filterToggleMobile) {
    filterToggleMobile.addEventListener('click', function() {
      filterSidebar.classList.add('active');
      
      // ایجاد overlay
      let overlay = document.querySelector('.filter-overlay');
      if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'filter-overlay';
        document.body.appendChild(overlay);
      }
      overlay.classList.add('active');
      
      overlay.addEventListener('click', function() {
        filterSidebar.classList.remove('active');
        overlay.classList.remove('active');
      });
    });
  }
  
  if (applyFilterMobile) {
    applyFilterMobile.addEventListener('click', function() {
      filterSidebar.classList.remove('active');
      const overlay = document.querySelector('.filter-overlay');
      if (overlay) overlay.classList.remove('active');
      applyFilters();
    });
  }
  
  // مگا منو موبایل (همان کد صفحه اصلی)
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
  
  // بررسی پارامتر URL برای فیلتر دسته‌بندی
  const urlParams = new URLSearchParams(window.location.search);
  const catParam = urlParams.get('cat');
  if (catParam) {
    const categoryMap = {
      'audio': 'audio',
      'video': 'video',
      'pdf': 'pdf'
    };
    
    const category = catParam.split('-')[0];
    if (categoryMap[category]) {
      const checkbox = document.querySelector(`.filter-category[value="${categoryMap[category]}"]`);
      if (checkbox) {
        checkbox.checked = true;
        applyFilters();
      }
    }
  }
});