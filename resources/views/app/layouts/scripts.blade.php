@section('scripts')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>




    <script>
        // ========================================
        // شروع اجرای کد پس از بارگذاری کامل صفحه
        // ========================================
        document.addEventListener('DOMContentLoaded', function() {


            // ========================================
            // // ۸. مگا منوی جدید - موبایل
            // // ========================================
            // const newHamburgerBtn = document.getElementById('newHamburgerBtn');
            // const newMegaMenuNav = document.getElementById('newMegaMenuNav');
            // const newMegaOverlay = document.getElementById('newMegaOverlay');
            // const newMegamenuItems = document.querySelectorAll('.new-mega-item.has-megamenu');

            // if (newHamburgerBtn && newMegaMenuNav) {
            //   // باز/بسته کردن منوی موبایل
            //   newHamburgerBtn.addEventListener('click', function() {
            //     this.classList.toggle('active');
            //     newMegaMenuNav.classList.toggle('active');
            //     newMegaOverlay.classList.toggle('active');
            //     document.body.style.overflow = newMegaMenuNav.classList.contains('active') ? 'hidden' : '';
            //   });

            //   // بستن منو با کلیک روی overlay
            //   newMegaOverlay.addEventListener('click', function() {
            //     newHamburgerBtn.classList.remove('active');
            //     newMegaMenuNav.classList.remove('active');
            //     this.classList.remove('active');
            //     document.body.style.overflow = '';
            //   });

            //   // باز/بسته کردن زیرمنوها در موبایل
            //   newMegamenuItems.forEach(function(item) {
            //     const link = item.querySelector('.new-mega-link');

            //     link.addEventListener('click', function(e) {
            //       if (window.innerWidth <= 768) {
            //         e.preventDefault();

            //         // بستن بقیه زیرمنوها
            //         newMegamenuItems.forEach(function(otherItem) {
            //           if (otherItem !== item) {
            //             otherItem.classList.remove('active');
            //           }
            //         });

            //         // باز/بسته کردن زیرمنوی فعلی
            //         item.classList.toggle('active');
            //       }
            //     });
            //   });

            //   // بستن منو هنگام تغییر اندازه صفحه
            //   window.addEventListener('resize', function() {
            //     if (window.innerWidth > 768) {
            //       newHamburgerBtn.classList.remove('active');
            //       newMegaMenuNav.classList.remove('active');
            //       newMegaOverlay.classList.remove('active');
            //       document.body.style.overflow = '';
            //       newMegamenuItems.forEach(function(item) {
            //         item.classList.remove('active');
            //       });
            //     }
            //   });

            //   // بستن منو با کلید Escape
            //   document.addEventListener('keydown', function(e) {
            //     if (e.key === 'Escape' && newMegaMenuNav.classList.contains('active')) {
            //       newHamburgerBtn.classList.remove('active');
            //       newMegaMenuNav.classList.remove('active');
            //       newMegaOverlay.classList.remove('active');
            //       document.body.style.overflow = '';
            //     }
            //   });
            // }











            // ========================================
            // ۸. مگا منوی جدید - موبایل
            // ========================================
            (function() {
                const newHamburgerBtn = document.getElementById('newHamburgerBtn');
                const newMegaMenuNav = document.getElementById('newMegaMenuNav');
                const newMegaOverlay = document.getElementById('newMegaOverlay');
                const newMegamenuItems = document.querySelectorAll('.new-mega-item.has-megamenu');

                console.log('تعداد آیتم‌های دارای زیرمنو:', newMegamenuItems.length);

                // تابع باز کردن منو
                function openMenu() {
                    if (newHamburgerBtn) newHamburgerBtn.classList.add('active');
                    if (newMegaMenuNav) newMegaMenuNav.classList.add('active');
                    if (newMegaOverlay) newMegaOverlay.classList.add('active');
                    document.body.style.overflow = 'hidden';
                    console.log('منو باز شد');
                }

                // تابع بستن منو
                function closeMenu() {
                    if (newHamburgerBtn) newHamburgerBtn.classList.remove('active');
                    if (newMegaMenuNav) newMegaMenuNav.classList.remove('active');
                    if (newMegaOverlay) newMegaOverlay.classList.remove('active');
                    document.body.style.overflow = '';
                    console.log('منو بسته شد');
                }

                // باز/بسته کردن منوی اصلی
                if (newHamburgerBtn) {
                    newHamburgerBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        if (newMegaMenuNav.classList.contains('active')) {
                            closeMenu();
                        } else {
                            openMenu();
                        }
                    });
                }

                // بستن منو با کلیک روی overlay
                if (newMegaOverlay) {
                    newMegaOverlay.addEventListener('click', function() {
                        closeMenu();
                    });
                }

                // باز/بسته کردن زیرمنوها
                newMegamenuItems.forEach(function(item, index) {
                    const link = item.querySelector('.new-mega-link');

                    console.log('آیتم ' + (index + 1) + ':', item);

                    if (link) {
                        link.addEventListener('click', function(e) {
                            console.log('کلیک روی لینک:', this.textContent.trim());

                            // فقط در حالت موبایل
                            if (window.innerWidth <= 768) {
                                e.preventDefault();
                                e.stopPropagation();

                                const isActive = item.classList.contains('active');

                                // بستن همه زیرمنوها
                                newMegamenuItems.forEach(function(otherItem) {
                                    otherItem.classList.remove('active');
                                });

                                // باز کردن زیرمنوی فعلی (اگر قبلاً باز نبود)
                                if (!isActive) {
                                    item.classList.add('active');
                                    console.log('زیرمنو باز شد برای:', this.textContent.trim());
                                } else {
                                    console.log('زیرمنو بسته شد برای:', this.textContent
                                        .trim());
                                }
                            }
                        });
                    }
                });

                // بستن منو هنگام تغییر اندازه صفحه
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        closeMenu();
                        newMegamenuItems.forEach(function(item) {
                            item.classList.remove('active');
                        });
                    }
                });

                // بستن منو با کلید Escape
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && newMegaMenuNav && newMegaMenuNav.classList.contains(
                            'active')) {
                        closeMenu();
                    }
                });
            })();








            // ========================================
            // ۱. اسلایدر پرفروش‌ترین فایل‌های صوتی
            // ========================================
            if (document.querySelector('.audioSwiper')) {
                const audioSwiper = new Swiper('.audioSwiper', {
                    // تنظیمات پایه
                    direction: 'horizontal',
                    slidesPerView: 1,
                    spaceBetween: 20,

                    // تنظیمات ریسپانسیو برای اندازه‌های مختلف صفحه
                    breakpoints: {
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 25,
                        },
                    },

                    // دکمه‌های ناوبری (قبلی/بعدی)
                    navigation: {
                        nextEl: '.audioSwiper .swiper-button-next',
                        prevEl: '.audioSwiper .swiper-button-prev',
                    },

                    // نقاط pagination
                    pagination: {
                        el: '.audioSwiper .swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },

                    // حرکت خودکار
                    autoplay: {
                        delay: 4000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },

                    // حلقه بی‌نهایت
                    loop: true,

                    // سرعت انیمیشن
                    speed: 600,

                    // نشانگر دست هنگام hover
                    grabCursor: true,
                });
            }

            // ========================================
            // ۲. اسلایدر پرفروش‌ترین فایل‌های الکترونیکی
            // ========================================
            if (document.querySelector('.ebookSwiper')) {
                const ebookSwiper = new Swiper('.ebookSwiper', {
                    // تنظیمات پایه
                    direction: 'horizontal',
                    slidesPerView: 1,
                    spaceBetween: 20,

                    // تنظیمات ریسپانسیو
                    breakpoints: {
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15,
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 25,
                        },
                    },

                    // دکمه‌های ناوبری
                    navigation: {
                        nextEl: '.ebookSwiper .swiper-button-next',
                        prevEl: '.ebookSwiper .swiper-button-prev',
                    },

                    // نقاط pagination
                    pagination: {
                        el: '.ebookSwiper .swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },

                    // حرکت خودکار (کمی دیرتر از صوتی برای تنوع)
                    autoplay: {
                        delay: 4500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },

                    // حلقه بی‌نهایت
                    loop: true,

                    // سرعت انیمیشن
                    speed: 600,

                    // نشانگر دست
                    grabCursor: true,
                });
            }




            // اسلایدر ۳: فایل‌های تصویری
            // ========================================
            if (document.querySelector('.videoSwiper')) {
                const videoSwiper = new Swiper('.videoSwiper', {
                    direction: 'horizontal',
                    slidesPerView: 1,
                    spaceBetween: 20,

                    breakpoints: {
                        576: {
                            slidesPerView: 2,
                            spaceBetween: 15
                        },
                        768: {
                            slidesPerView: 3,
                            spaceBetween: 20
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetween: 25
                        },
                    },

                    navigation: {
                        nextEl: '.videoSwiper .swiper-button-next',
                        prevEl: '.videoSwiper .swiper-button-prev',
                    },

                    pagination: {
                        el: '.videoSwiper .swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },

                    autoplay: {
                        delay: 5000, // کمی دیرتر از بقیه
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },

                    loop: true,
                    speed: 600,
                    grabCursor: true,
                });
            }

            // ========================================
            // دکمه پخش ویدیو
            // ========================================
            document.querySelectorAll('.play-btn-video').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // افکت کلیک
                    this.style.transform = 'translate(-50%, -50%) scale(0.9)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);

                    alert('🎬 پیش‌نمایش ویدیو در حال پخش...');
                });
            });



            // ========================================
            // ۳. تب‌های پربازدیدترین محصولات
            // ========================================
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabPanes = document.querySelectorAll('.tab-pane');

            // بررسی وجود تب‌ها
            if (tabButtons.length > 0) {
                tabButtons.forEach(function(button) {
                    button.addEventListener('click', function(event) {
                        event.preventDefault();

                        // دریافت نام تب مورد نظر
                        const targetTab = this.getAttribute('data-tab');

                        // حذف کلاس active از همه دکمه‌ها
                        tabButtons.forEach(function(btn) {
                            btn.classList.remove('active');
                        });

                        // اضافه کردن کلاس active به دکمه کلیک‌شده
                        this.classList.add('active');

                        // مخفی کردن همه پنل‌ها
                        tabPanes.forEach(function(pane) {
                            pane.classList.remove('active');
                        });

                        // نمایش پنل مورد نظر
                        const targetPane = document.getElementById('tab-' + targetTab);
                        if (targetPane) {
                            targetPane.classList.add('active');

                            // انیمیشن نوارهای محبوبیت
                            setTimeout(function() {
                                const popularityBars = targetPane.querySelectorAll(
                                    '.popularity-fill');
                                popularityBars.forEach(function(bar) {
                                    const targetWidth = bar.style.width;
                                    bar.style.width = '0%';

                                    setTimeout(function() {
                                        bar.style.width = targetWidth;
                                    }, 50);
                                });
                            }, 100);
                        }
                    });
                });

                // انیمیشن اولیه نوارهای محبوبیت در تب فعال
                setTimeout(function() {
                    const activePane = document.querySelector('.tab-pane.active');
                    if (activePane) {
                        const initialBars = activePane.querySelectorAll('.popularity-fill');
                        initialBars.forEach(function(bar) {
                            const targetWidth = bar.style.width;
                            bar.style.width = '0%';

                            setTimeout(function() {
                                bar.style.width = targetWidth;
                            }, 300);
                        });
                    }
                }, 500);
            }

            // ========================================
            // ۴. دکمه‌های پخش (اسلایدر صوتی)
            // ========================================
            const playButtons = document.querySelectorAll('.play-btn');
            playButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    // افکت کلیک
                    this.style.transform = 'scale(0.9)';

                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);

                    // اینجا می‌تونی پخش صوت واقعی رو اضافه کنی
                    alert('🎵 پیش‌نمایش صوتی در حال پخش...');
                });
            });

            // ========================================
            // ۵. دکمه‌های پیش‌نمایش (اسلایدر الکترونیکی)
            // ========================================
            const previewButtons = document.querySelectorAll('.preview-btn');
            previewButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    // افکت کلیک
                    this.style.transform = 'scale(0.9) rotate(-10deg)';

                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);

                    // اینجا می‌تونی پیش‌نمایش کتاب رو اضافه کنی
                    alert('📖 در حال بارگذاری پیش‌نمایش کتاب...');
                });
            });

            // ========================================
            // ۶. دکمه‌های افزودن به سبد خرید (اختیاری)
            // ========================================
            const addToCartButtons = document.querySelectorAll('.btn-add-cart');
            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    // افکت کلیک
                    const originalText = this.textContent;
                    this.textContent = '✓ اضافه شد';
                    this.style.background = '#10b981';

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                    }, 1500);

                    // اینجا می‌تونی منطق سبد خرید رو اضافه کنی
                    console.log('محصول به سبد خرید اضافه شد');
                });
            });



            // دکمه‌های افزودن به سبد مدرن
            // ========================================
            const modernCartBtns = document.querySelectorAll('.btn-cart-modern');

            modernCartBtns.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // جلوگیری از کلیک مکرر
                    if (this.classList.contains('added') || this.classList.contains('loading')) {
                        return;
                    }

                    const icon = this.querySelector('.cart-icon');
                    const text = this.querySelector('.cart-text');
                    const originalIcon = icon.textContent;
                    const originalText = text ? text.textContent : '';

                    // مرحله ۱: حالت Loading
                    this.classList.add('loading');
                    icon.textContent = '⏳';

                    // مرحله ۲: بعد از ۵۰۰ میلی‌ثانیه، حالت "اضافه شد"
                    setTimeout(() => {
                        this.classList.remove('loading');
                        this.classList.add('added');
                        icon.textContent = '✓';
                        if (text) text.textContent = 'اضافه شد!';

                        // افکت ripple
                        const ripple = this.querySelector('.cart-ripple');
                        if (ripple) {
                            ripple.style.width = '300px';
                            ripple.style.height = '300px';
                            ripple.style.opacity = '0';
                        }

                        // مرحله ۳: بازگشت به حالت اولیه بعد از ۲ ثانیه
                        setTimeout(() => {
                            this.classList.remove('added');
                            icon.textContent = originalIcon;
                            if (text) text.textContent = originalText;

                            // ریست ripple
                            if (ripple) {
                                ripple.style.width = '0';
                                ripple.style.height = '0';
                                ripple.style.opacity = '1';
                            }
                        }, 2000);

                    }, 500);

                    // اینجا می‌تونی منطق سبد خرید واقعی رو اضافه کنی
                    console.log('محصول به سبد خرید اضافه شد');
                });
            });






        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ========================================
            // تایمر شمارش معکوس تخفیف‌ها
            // ========================================
            function startCountdown() {
                // زمان پایان: ۲۴ ساعت از الان
                const endTime = new Date().getTime() + (24 * 60 * 60 * 1000);

                function updateTimer() {
                    const now = new Date().getTime();
                    const remaining = endTime - now;

                    if (remaining <= 0) {
                        document.getElementById('timer-hours').textContent = '۰۰';
                        document.getElementById('timer-minutes').textContent = '۰۰';
                        document.getElementById('timer-seconds').textContent = '۰۰';
                        return;
                    }

                    const hours = Math.floor(remaining / (1000 * 60 * 60));
                    const minutes = Math.floor((remaining % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((remaining % (1000 * 60)) / 1000);

                    // تبدیل به اعداد فارسی
                    function toPersianNum(num) {
                        const persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                        return String(num).padStart(2, '0').replace(/\d/g, d => persianDigits[d]);
                    }

                    const hoursEl = document.getElementById('timer-hours');
                    const minutesEl = document.getElementById('timer-minutes');
                    const secondsEl = document.getElementById('timer-seconds');

                    if (hoursEl) hoursEl.textContent = toPersianNum(hours);
                    if (minutesEl) minutesEl.textContent = toPersianNum(minutes);
                    if (secondsEl) secondsEl.textContent = toPersianNum(seconds);
                }

                updateTimer();
                setInterval(updateTimer, 1000);
            }

            startCountdown();

            // انیمیشن نوارهای فروش هنگام اسکرول
            // ========================================
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const bars = entry.target.querySelectorAll('.offer-progress-fill');
                        bars.forEach(function(bar) {
                            const width = bar.style.width;
                            bar.style.width = '0%';
                            setTimeout(function() {
                                bar.style.width = width;
                            }, 200);
                        });
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.3
            });

            const offersGrid = document.querySelector('.offers-grid');
            if (offersGrid) {
                observer.observe(offersGrid);
            }


            // افکت دکمه‌های افزودن به سبد (بخش تخفیف)
            // ========================================
            const offerCartBtns = document.querySelectorAll('.offer-cart-btn');
            offerCartBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const originalText = this.textContent;
                    this.textContent = '✓ به سبد اضافه شد!';
                    this.style.background = 'linear-gradient(135deg, #10b981 0%, #059669 100%)';

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                    }, 2000);
                });
            });

        });
    </script>





@show
