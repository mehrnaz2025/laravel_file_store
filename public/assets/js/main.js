// نمونه داده محصولات
const products = [
  { id: 1, title: 'آموزش پیشرفته فتوشاپ', category: 'video', price: 150000, image: 'https://via.placeholder.com/300x200/2d2d2d/C0C0C0?text=Product+1' },
  { id: 2, title: 'کتاب برنامه‌نویسی پایتون', category: 'pdf', price: 80000, image: 'https://via.placeholder.com/300x200/2d2d2d/C0C0C0?text=Product+2' },
  { id: 3, title: 'پادکست مدیریت زمان', category: 'audio', price: 50000, image: 'https://via.placeholder.com/300x200/2d2d2d/C0C0C0?text=Product+3' },
  { id: 4, title: 'دوره جامع طراحی وب', category: 'video', price: 250000, image: 'https://via.placeholder.com/300x200/2d2d2d/C0C0C0?text=Product+4' },
  { id: 5, title: 'مجموعه موسیقی کلاسیک', category: 'audio', price: 120000, image: 'https://via.placeholder.com/300x200/2d2d2d/C0C0C0?text=Product+5' },
  { id: 6, title: 'جزوه ریاضی دانشگاهی', category: 'pdf', price: 60000, image: 'https://via.placeholder.com/300x200/2d2d2d/C0C0C0?text=Product+6' },
];

// نمایش محصولات
function displayProducts(productsToShow) {
  const grid = document.getElementById('productsGrid');
  grid.innerHTML = '';
  
  productsToShow.forEach(product => {
    const categoryIcon = product.category === 'audio' ? '🎵' : product.category === 'video' ? '🎬' : '📄';
    
    grid.innerHTML += `
      <div class="col-md-4">
        <div class="card-custom">
          <img src="${product.image}" class="card-img-top" alt="${product.title}">
          <div class="card-body">
            <h5 class="card-title">${categoryIcon} ${product.title}</h5>
            <p class="price">${product.price.toLocaleString('fa-IR')} تومان</p>
            <a href="product-detail.html?id=${product.id}" class="btn btn-silver w-100">مشاهده</a>
          </div>
        </div>
      </div>
    `;
  });
}

// فیلتر محصولات
function filterProducts() {
  const selectedCategories = Array.from(document.querySelectorAll('[data-filter]:checked')).map(el => el.dataset.filter);
  const maxPrice = parseInt(document.getElementById('priceRange').value);
  const sortBy = document.getElementById('sortBy').value;
  
  let filtered = products.filter(product => {
    const categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(product.category);
    const priceMatch = product.price <= maxPrice;
    return categoryMatch && priceMatch;
  });
  
  // مرتب‌سازی
  if (sortBy === 'price-low') {
    filtered.sort((a, b) => a.price - b.price);
  } else if (sortBy === 'price-high') {
    filtered.sort((a, b) => b.price - a.price);
  }
  
  displayProducts(filtered);
}

// تغییر قیمت
document.getElementById('priceRange').addEventListener('input', function() {
  document.getElementById('priceValue').textContent = parseInt(this.value).toLocaleString('fa-IR') + ' تومان';
});

// اعمال فیلتر
document.getElementById('applyFilter').addEventListener('click', filterProducts);

// پاک کردن فیلتر
document.getElementById('resetFilter').addEventListener('click', function() {
  document.querySelectorAll('[data-filter]').forEach(el => el.checked = false);
  document.getElementById('priceRange').value = 500000;
  document.getElementById('priceValue').textContent = '۵۰۰,۰۰۰ تومان';
  document.getElementById('sortBy').value = 'newest';
  displayProducts(products);
});

// نمایش اولیه
displayProducts(products);