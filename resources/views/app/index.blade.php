@extends('app.layouts.master')


@section('content')


      <!-- 4. Hero Banner -->
    <section class="hero-banner">
        <div class="container">
            <div class="banner-box">
                <h1>هزاران فایل آموزشی و کاربردی در جیب شما</h1>
                <p>الماس پلی است میان شما و دنیای بی‌پایان دانش. بهترین فایل‌های صوتی، ویدیوهای آموزشی و کتاب‌های PDF را
                    همین حالا دانلود کنید.</p>
                <a href="products.html" class="btn-primary-custom">مشاهده فروشگاه</a>
            </div>
        </div>
    </section>

    <!-- 5. Categories Row -->
    <section class="container">
        <div class="categories-row">
            <div class="cat-item" onclick="location.href='products.html?cat=audio'">
                <div class="cat-icon">🎵</div>
                <span>فایل صوتی</span>
            </div>
            <div class="cat-item" onclick="location.href='products.html?cat=video'">
                <div class="cat-icon">🎬</div>
                <span>فایل تصویری</span>
            </div>
            <div class="cat-item" onclick="location.href='products.html?cat=pdf'">
                <div class="cat-icon">📄</div>
                <span>فایل PDF</span>
            </div>

        </div>
    </section>



    <!-- ========================================  بخش پربازدیدترین محصولات (تب‌دار)  ======================================== -->
    <section class="trending-section">
        <div class="container">

            <!-- هدر با تب‌ها -->
            <div class="section-header">
                <h2>🔥 پربازدیدترین محصولات</h2>
                <div class="trending-tabs">
                    <button class="tab-btn active" data-tab="today">امروز</button>
                    <button class="tab-btn" data-tab="week">هفته</button>
                    <button class="tab-btn" data-tab="month">ماه</button>
                </div>
            </div>

            <!-- محتوای تب‌ها -->
            <div class="trending-content">

                <!-- تب امروز -->
                <div class="tab-pane active" id="tab-today">
                    <div class="trending-grid">

                        <!-- محصول ۱ -->
                        <div class="trending-card">
                            <div class="trending-rank">۱</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/1e3a8a/ffffff?text=Web+Design"
                                    alt="طراحی وب">
                                <span class="trending-badge">🔥 داغ</span>
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎬 فایل تصویری</div>
                                <h3 class="trending-title">دوره جامع طراحی وب مدرن</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۲,۵۴۰ بازدید</span>
                                    <span class="trending-trend">📈 +۱۲۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 95%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۲۵۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- محصول ۲ -->
                        <div class="trending-card">
                            <div class="trending-rank">۲</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/2563eb/ffffff?text=Python" alt="پایتون">
                                <span class="trending-badge">🔥 داغ</span>
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">📄 فایل PDF</div>
                                <h3 class="trending-title">کتاب آموزش پایتون پیشرفته</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱,۸۹۰ بازدید</span>
                                    <span class="trending-trend">📈 +۸۵</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 82%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۹۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- محصول ۳ -->
                        <div class="trending-card">
                            <div class="trending-rank">۳</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/e8998d/ffffff?text=Podcast"
                                    alt="پادکست">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎵 فایل صوتی</div>
                                <h3 class="trending-title">پادکست مدیریت زمان</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱,۶۵۰ بازدید</span>
                                    <span class="trending-trend">📈 +۶۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۴۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- محصول ۴ -->
                        <div class="trending-card">
                            <div class="trending-rank">۴</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/3b82f6/ffffff?text=UI+UX"
                                    alt="UI/UX">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎬 فایل تصویری</div>
                                <h3 class="trending-title">دوره تخصصی طراحی UI/UX</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱,۴۲۰ بازدید</span>
                                    <span class="trending-trend">📈 +۴۵</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 68%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۲۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- محصول ۵ -->
                        <div class="trending-card">
                            <div class="trending-rank">۵</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/60a5fa/ffffff?text=Novel"
                                    alt="رمان">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">📄 فایل PDF</div>
                                <h3 class="trending-title">رمان بادی که در باد رفت</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱,۲۸۰ بازدید</span>
                                    <span class="trending-trend">📈 +۳۸</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 60%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۶۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- محصول ۶ -->
                        <div class="trending-card">
                            <div class="trending-rank">۶</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/1e3a8a/ffffff?text=AI" alt="هوش مصنوعی">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">📄 فایل PDF</div>
                                <h3 class="trending-title">هوش مصنوعی و یادگیری ماشین</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱,۱۵۰ بازدید</span>
                                    <span class="trending-trend">📈 +۳۲</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 55%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۱۲۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- تب هفته -->
                <div class="tab-pane" id="tab-week">
                    <div class="trending-grid">
                        <div class="trending-card">
                            <div class="trending-rank">۱</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/e8998d/ffffff?text=Meditation"
                                    alt="مراقبه">
                                <span class="trending-badge">🔥 داغ</span>
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎵 فایل صوتی</div>
                                <h3 class="trending-title">مجموعه مدیتیشن آرامش درون</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۸,۴۵۰ بازدید</span>
                                    <span class="trending-trend">📈 +۵۲۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 98%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۳۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۲</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/2563eb/ffffff?text=Marketing"
                                    alt="مارکتینگ">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎬 فایل تصویری</div>
                                <h3 class="trending-title">دوره دیجیتال مارکتینگ حرفه‌ای</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۷,۲۳۰ بازدید</span>
                                    <span class="trending-trend">📈 +۴۸۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 88%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۳۲۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۳</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/1e3a8a/ffffff?text=Startup"
                                    alt="استارتاپ">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">📄 فایل PDF</div>
                                <h3 class="trending-title">راهنمای جامع استارتاپ</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۶,۸۹۰ بازدید</span>
                                    <span class="trending-trend">📈 +۴۲۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 82%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۱۱۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۴</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/3b82f6/ffffff?text=Photography"
                                    alt="عکاسی">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎬 فایل تصویری</div>
                                <h3 class="trending-title">آموزش عکاسی حرفه‌ای</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۵,۶۷۰ بازدید</span>
                                    <span class="trending-trend">📈 +۳۵۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 72%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۱۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۵</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/60a5fa/ffffff?text=English"
                                    alt="زبان">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎵 فایل صوتی</div>
                                <h3 class="trending-title">آموزش زبان انگلیسی با پادکست</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۴,۹۸۰ بازدید</span>
                                    <span class="trending-trend">📈 +۲۹۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 65%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۱۲۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۶</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/e8998d/ffffff?text=Music"
                                    alt="موسیقی">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎵 فایل صوتی</div>
                                <h3 class="trending-title">مجموعه موسیقی کلاسیک پیانو</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۴,۳۲۰ بازدید</span>
                                    <span class="trending-trend">📈 +۲۴۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 58%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۶۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- تب ماه -->
                <div class="tab-pane" id="tab-month">
                    <div class="trending-grid">
                        <div class="trending-card">
                            <div class="trending-rank">۱</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/1e3a8a/ffffff?text=React"
                                    alt="React">
                                <span class="trending-badge">🔥 داغ</span>
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎬 فایل تصویری</div>
                                <h3 class="trending-title">دوره جامع React و Next.js</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۳۲,۵۰۰ بازدید</span>
                                    <span class="trending-trend">📈 +۲,۱۰۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 99%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۴۵۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۲</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/2563eb/ffffff?text=Data+Science"
                                    alt="علم داده">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">📄 فایل PDF</div>
                                <h3 class="trending-title">کتاب علم داده با پایتون</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۲۸,۹۰۰ بازدید</span>
                                    <span class="trending-trend">📈 +۱,۸۵۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 92%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۱۵۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۳</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/e8998d/ffffff?text=Audiobook"
                                    alt="کتاب صوتی">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎵 فایل صوتی</div>
                                <h3 class="trending-title">کتاب صوتی عادت‌های اتمی</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۲۵,۴۰۰ بازدید</span>
                                    <span class="trending-trend">📈 +۱,۶۰۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 85%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۸۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۴</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/3b82f6/ffffff?text=Video+Edit"
                                    alt="ویرایش ویدیو">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎬 فایل تصویری</div>
                                <h3 class="trending-title">آموزش پریمیر و افتر افکت</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۲۲,۱۰۰ بازدید</span>
                                    <span class="trending-trend">📈 +۱,۴۰۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 78%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۳۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۵</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/60a5fa/ffffff?text=Business"
                                    alt="کسب و کار">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">📄 فایل PDF</div>
                                <h3 class="trending-title">اصول مدیریت کسب و کار</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱۹,۸۰۰ بازدید</span>
                                    <span class="trending-trend">📈 +۱,۲۰۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 70%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۹۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="trending-card">
                            <div class="trending-rank">۶</div>
                            <div class="trending-image">
                                <img src="https://via.placeholder.com/150x150/1e3a8a/ffffff?text=Design"
                                    alt="طراحی">
                            </div>
                            <div class="trending-info">
                                <div class="trending-category">🎨 کتاب هنری</div>
                                <h3 class="trending-title">اصول طراحی گرافیک مدرن</h3>
                                <div class="trending-stats">
                                    <span class="trending-views">👁️ ۱۷,۵۰۰ بازدید</span>
                                    <span class="trending-trend">📈 +۱,۰۵۰</span>
                                </div>
                                <div class="trending-popularity">
                                    <div class="popularity-bar">
                                        <div class="popularity-fill" style="width: 63%"></div>
                                    </div>
                                </div>
                                <div class="trending-footer">
                                    <span class="trending-price">۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>




    <!-- ========================================  بخش تخفیف‌های ویژه با تایمر   ======================================== -->
    <section class="offers-section">
        <div class="container">

            <!-- بنر تخفیف -->
            <div class="offers-banner">
                <div class="offers-banner-content">
                    <div class="offers-text">
                        <span class="offers-label">🔥 پیشنهاد ویژه</span>
                        <h2>تا <span class="discount-number">٪۷۰</span> تخفیف</h2>
                        <p>بهترین فایل‌های آموزشی با قیمت‌های باورنکردنی</p>
                    </div>
                    <div class="offers-timer">
                        <span class="timer-label">زمان باقی‌مانده:</span>
                        <div class="timer-boxes">
                            <div class="timer-box">
                                <span class="timer-num" id="timer-hours">۲۳</span>
                                <span class="timer-txt">ساعت</span>
                            </div>
                            <div class="timer-sep">:</div>
                            <div class="timer-box">
                                <span class="timer-num" id="timer-minutes">۵۹</span>
                                <span class="timer-txt">دقیقه</span>
                            </div>
                            <div class="timer-sep">:</div>
                            <div class="timer-box">
                                <span class="timer-num" id="timer-seconds">۵۹</span>
                                <span class="timer-txt">ثانیه</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offers-banner-bg">💎</div>
            </div>

            <!-- گرید محصولات تخفیف‌دار -->
            <div class="offers-grid">

                <!-- محصول ۱ -->
                <div class="offer-card">
                    <div class="offer-ribbon">٪۳۰</div>
                    <div class="offer-image">
                        <img src="https://via.placeholder.com/400x250/1e3a8a/ffffff?text=Photoshop" alt="فتوشاپ">
                        <div class="offer-overlay">
                            <a href="product-detail.html" class="offer-quick-view">مشاهده سریع</a>
                        </div>
                    </div>
                    <div class="offer-body">
                        <div class="offer-cat">🎬 فایل تصویری</div>
                        <h3 class="offer-title">دوره جامع آموزش فتوشاپ ۲۰۲۴</h3>
                        <div class="offer-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rate-count">(۱۲۸)</span>
                        </div>
                        <div class="offer-prices">
                            <span class="offer-old-price">۲۰۰,۰۰۰</span>
                            <span class="offer-new-price">۱۴۰,۰۰۰ <small>تومان</small></span>
                        </div>
                        <div class="offer-progress">
                            <div class="offer-progress-bar">
                                <div class="offer-progress-fill" style="width: 72%"></div>
                            </div>
                            <span class="offer-sold">۷۲٪ فروخته شده</span>
                        </div>
                        <button class="offer-cart-btn">🛒 افزودن به سبد خرید</button>
                    </div>
                </div>

                <!-- محصول ۲ -->
                <div class="offer-card">
                    <div class="offer-ribbon">٪۵۰</div>
                    <div class="offer-image">
                        <img src="https://via.placeholder.com/400x250/e8998d/ffffff?text=Python+Book" alt="پایتون">
                        <div class="offer-overlay">
                            <a href="product-detail.html" class="offer-quick-view">مشاهده سریع</a>
                        </div>
                    </div>
                    <div class="offer-body">
                        <div class="offer-cat">📄 فایل PDF</div>
                        <h3 class="offer-title">کتاب آموزش پایتون برای هوش مصنوعی</h3>
                        <div class="offer-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rate-count">(۹۵)</span>
                        </div>
                        <div class="offer-prices">
                            <span class="offer-old-price">۱۰۰,۰۰۰</span>
                            <span class="offer-new-price">۵۰,۰۰۰ <small>تومان</small></span>
                        </div>
                        <div class="offer-progress">
                            <div class="offer-progress-bar">
                                <div class="offer-progress-fill" style="width: 85%"></div>
                            </div>
                            <span class="offer-sold">۸۵٪ فروخته شده</span>
                        </div>
                        <button class="offer-cart-btn">🛒 افزودن به سبد خرید</button>
                    </div>
                </div>

                <!-- محصول ۳ -->
                <div class="offer-card">
                    <div class="offer-ribbon">٪۴۰</div>
                    <div class="offer-image">
                        <img src="https://via.placeholder.com/400x250/2563eb/ffffff?text=UI+UX" alt="UI/UX">
                        <div class="offer-overlay">
                            <a href="product-detail.html" class="offer-quick-view">مشاهده سریع</a>
                        </div>
                    </div>
                    <div class="offer-body">
                        <div class="offer-cat">🎬 فایل تصویری</div>
                        <h3 class="offer-title">دوره تخصصی طراحی UI/UX با فیگما</h3>
                        <div class="offer-rating">
                            <span class="stars">⭐⭐⭐⭐</span>
                            <span class="rate-count">(۷۶)</span>
                        </div>
                        <div class="offer-prices">
                            <span class="offer-old-price">۳۵۰,۰۰۰</span>
                            <span class="offer-new-price">۲۱۰,۰۰۰ <small>تومان</small></span>
                        </div>
                        <div class="offer-progress">
                            <div class="offer-progress-bar">
                                <div class="offer-progress-fill" style="width: 60%"></div>
                            </div>
                            <span class="offer-sold">۶۰٪ فروخته شده</span>
                        </div>
                        <button class="offer-cart-btn">🛒 افزودن به سبد خرید</button>
                    </div>
                </div>

                <!-- محصول ۴ -->
                <div class="offer-card">
                    <div class="offer-ribbon">٪۷۰</div>
                    <div class="offer-image">
                        <img src="https://via.placeholder.com/400x250/3b82f6/ffffff?text=React" alt="React">
                        <div class="offer-overlay">
                            <a href="product-detail.html" class="offer-quick-view">مشاهده سریع</a>
                        </div>
                    </div>
                    <div class="offer-body">
                        <div class="offer-cat">🎬 فایل تصویری</div>
                        <h3 class="offer-title">دوره جامع React و Next.js</h3>
                        <div class="offer-rating">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                            <span class="rate-count">(۲۱۰)</span>
                        </div>
                        <div class="offer-prices">
                            <span class="offer-old-price">۴۵۰,۰۰۰</span>
                            <span class="offer-new-price">۱۳۵,۰۰۰ <small>تومان</small></span>
                        </div>
                        <div class="offer-progress">
                            <div class="offer-progress-bar">
                                <div class="offer-progress-fill" style="width: 93%"></div>
                            </div>
                            <span class="offer-sold">۹۳٪ فروخته شده</span>
                        </div>
                        <button class="offer-cart-btn">🛒 افزودن به سبد خرید</button>
                    </div>
                </div>

            </div>

            <!-- دکمه مشاهده همه -->
            <div class="offers-more">
                <a href="products.html" class="offers-more-btn">مشاهده همه تخفیف‌ها ←</a>
            </div>

        </div>
    </section>




    <!-- ========================================   اسلایدر پرفروش‌ترین فایل‌های صوتی ======================================== -->
    <section class="audio-slider-section">
        <div class="container">

            <!-- هدر بخش -->
            <div class="section-header">
                <h2>🎵 پرفروش‌ترین فایل‌های صوتی</h2>
                <a href="products.html?cat=audio">مشاهده همه ←</a>
            </div>

            <!-- Swiper Container -->
            <div class="swiper audioSwiper">
                <div class="swiper-wrapper">

                    <!-- کارت ۱ -->
                    <div class="swiper-slide">
                        <div class="audio-card">
                            <div class="audio-image">
                                <span class="audio-badge">🔥 پرفروش</span>
                                <span class="audio-rank">#۱</span>
                                <img src="https://via.placeholder.com/300x300/1e3a8a/ffffff?text=Podcast+1"
                                    alt="پادکست">
                                <button class="play-btn" title="پیش‌نمایش">
                                    ▶
                                </button>
                            </div>
                            <div class="audio-info">
                                <div class="audio-category">🎙️ پادکست</div>
                                <h3 class="audio-title">پادکست مدیریت زمان و بهره‌وری</h3>
                                <div class="audio-author">🎤 گوینده: علی محمدی</div>
                                <div class="audio-meta">
                                    <span class="audio-rating">⭐ ۴.۹</span>
                                    <span class="audio-duration">⏱️ ۲ ساعت</span>
                                </div>
                                <div class="audio-price-box">
                                    <span class="audio-price">۴۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۲ -->
                    <div class="swiper-slide">
                        <div class="audio-card">
                            <div class="audio-image">
                                <span class="audio-badge">🔥 پرفروش</span>
                                <span class="audio-rank">#۲</span>
                                <img src="https://via.placeholder.com/300x300/2563eb/ffffff?text=Audiobook"
                                    alt="کتاب صوتی">
                                <button class="play-btn" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="audio-info">
                                <div class="audio-category">📖 کتاب صوتی</div>
                                <h3 class="audio-title">کتاب صوتی عادت‌های اتمی</h3>
                                <div class="audio-author">🎤 گوینده: رضا کریمی</div>
                                <div class="audio-meta">
                                    <span class="audio-rating">⭐ ۴.۸</span>
                                    <span class="audio-duration">⏱️ ۵ ساعت</span>
                                </div>
                                <div class="audio-price-box">
                                    <span class="audio-price">۸۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۳ -->
                    <div class="swiper-slide">
                        <div class="audio-card">
                            <div class="audio-image">
                                <span class="audio-badge">🔥 پرفروش</span>
                                <span class="audio-rank">#۳</span>
                                <img src="https://via.placeholder.com/300x300/e8998d/ffffff?text=Meditation"
                                    alt="مراقبه">
                                <button class="play-btn" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="audio-info">
                                <div class="audio-category">🧘 مراقبه و آرامش</div>
                                <h3 class="audio-title">مجموعه مدیتیشن آرامش درون</h3>
                                <div class="audio-author">🎤 گوینده: سارا احمدی</div>
                                <div class="audio-meta">
                                    <span class="audio-rating">⭐ ۴.۹</span>
                                    <span class="audio-duration">⏱️ ۱.۵ ساعت</span>
                                </div>
                                <div class="audio-price-box">
                                    <span class="audio-price">۳۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۴ -->
                    <div class="swiper-slide">
                        <div class="audio-card">
                            <div class="audio-image">
                                <span class="audio-badge">🔥 پرفروش</span>
                                <span class="audio-rank">#۴</span>
                                <img src="https://via.placeholder.com/300x300/3b82f6/ffffff?text=Music"
                                    alt="موسیقی">
                                <button class="play-btn" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="audio-info">
                                <div class="audio-category">🎼 موسیقی</div>
                                <h3 class="audio-title">مجموعه موسیقی کلاسیک پیانو</h3>
                                <div class="audio-author">🎹 هنرمند: آرمان موسوی</div>
                                <div class="audio-meta">
                                    <span class="audio-rating">⭐ ۴.۷</span>
                                    <span class="audio-duration">⏱️ ۳ ساعت</span>
                                </div>
                                <div class="audio-price-box">
                                    <span class="audio-price">۶۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۵ -->
                    <div class="swiper-slide">
                        <div class="audio-card">
                            <div class="audio-image">
                                <span class="audio-badge">🔥 پرفروش</span>
                                <span class="audio-rank">#۵</span>
                                <img src="https://via.placeholder.com/300x300/60a5fa/ffffff?text=Tutorial"
                                    alt="آموزش">
                                <button class="play-btn" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="audio-info">
                                <div class="audio-category">🎧 آموزش صوتی</div>
                                <h3 class="audio-title">آموزش زبان انگلیسی با پادکست</h3>
                                <div class="audio-author">🎤 مدرس: دکتر رضایی</div>
                                <div class="audio-meta">
                                    <span class="audio-rating">⭐ ۴.۸</span>
                                    <span class="audio-duration">⏱️ ۱۰ ساعت</span>
                                </div>
                                <div class="audio-price-box">
                                    <span class="audio-price">۱۲۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۶ -->
                    <div class="swiper-slide">
                        <div class="audio-card">
                            <div class="audio-image">
                                <span class="audio-badge">🔥 پرفروش</span>
                                <span class="audio-rank">#۶</span>
                                <img src="https://via.placeholder.com/300x300/1e3a8a/ffffff?text=Story"
                                    alt="داستان">
                                <button class="play-btn" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="audio-info">
                                <div class="audio-category">📖 داستان صوتی</div>
                                <h3 class="audio-title">مجموعه داستان‌های کوتاه کلاسیک</h3>
                                <div class="audio-author">🎤 گوینده: مریم حسینی</div>
                                <div class="audio-meta">
                                    <span class="audio-rating">⭐ ۴.۶</span>
                                    <span class="audio-duration">⏱️ ۴ ساعت</span>
                                </div>
                                <div class="audio-price-box">
                                    <span class="audio-price">۵۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>

            </div>
        </div>
    </section>



    <!-- ========================================   اسلایدر پرفروش‌ترین فایل‌های الکترونیکی  ======================================== -->
    <section class="ebook-slider-section">
        <div class="container">
            <!-- هدر بخش -->
            <div class="section-header">
                <h2>📚 پرفروش‌ترین فایل‌های الکترونیکی</h2>
                <a href="products.html?cat=pdf">مشاهده همه ←</a>
            </div>

            <!-- Swiper Container -->
            <div class="swiper ebookSwiper">
                <div class="swiper-wrapper">

                    <!-- کارت ۱ -->
                    <div class="swiper-slide">
                        <div class="ebook-card">
                            <div class="ebook-image">
                                <span class="ebook-badge">🔥 پرفروش</span>
                                <span class="ebook-rank">#۱</span>
                                <span class="ebook-format">PDF</span>
                                <img src="https://via.placeholder.com/300x380/1e3a8a/ffffff?text=Python+Book"
                                    alt="کتاب پایتون">
                                <button class="preview-btn" title="پیش‌نمایش">👁️</button>
                            </div>
                            <div class="ebook-info">
                                <div class="ebook-category">📖 کتاب علمی</div>
                                <h3 class="ebook-title">آموزش جامع برنامه‌نویسی پایتون</h3>
                                <div class="ebook-author">✍️ نویسنده: دکتر رضایی</div>
                                <div class="ebook-meta">
                                    <span class="ebook-pages">📄 ۴۵۰ صفحه</span>
                                    <span class="ebook-size">💾 ۲۵ مگابایت</span>
                                </div>
                                <div class="ebook-price-box">
                                    <span class="ebook-price">۹۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۲ -->
                    <div class="swiper-slide">
                        <div class="ebook-card">
                            <div class="ebook-image">
                                <span class="ebook-badge">🔥 پرفروش</span>
                                <span class="ebook-rank">#۲</span>
                                <span class="ebook-format">EPUB</span>
                                <img src="https://via.placeholder.com/300x380/2563eb/ffffff?text=AI+Book"
                                    alt="کتاب هوش مصنوعی">
                                <button class="preview-btn" title="پیش‌نمایش">👁️</button>
                            </div>
                            <div class="ebook-info">
                                <div class="ebook-category">📖 کتاب علمی</div>
                                <h3 class="ebook-title">هوش مصنوعی و یادگیری ماشین</h3>
                                <div class="ebook-author">✍️ نویسنده: مهندس کریمی</div>
                                <div class="ebook-meta">
                                    <span class="ebook-pages">📄 ۳۲۰ صفحه</span>
                                    <span class="ebook-size">💾 ۱۸ مگابایت</span>
                                </div>
                                <div class="ebook-price-box">
                                    <span class="ebook-price">۱۲۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۳ -->
                    <div class="swiper-slide">
                        <div class="ebook-card">
                            <div class="ebook-image">
                                <span class="ebook-badge">🔥 پرفروش</span>
                                <span class="ebook-rank">#۳</span>
                                <span class="ebook-format">PDF</span>
                                <img src="https://via.placeholder.com/300x380/e8998d/ffffff?text=Novel"
                                    alt="رمان">
                                <button class="preview-btn" title="پیش‌نمایش">👁️</button>
                            </div>
                            <div class="ebook-info">
                                <div class="ebook-category">📕 رمان و داستان</div>
                                <h3 class="ebook-title">رمان بادی که در باد رفت</h3>
                                <div class="ebook-author">✍️ نویسنده: مریم حسینی</div>
                                <div class="ebook-meta">
                                    <span class="ebook-pages">📄 ۲۸۰ صفحه</span>
                                    <span class="ebook-size">💾 ۱۲ مگابایت</span>
                                </div>
                                <div class="ebook-price-box">
                                    <span class="ebook-price">۶۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۴ -->
                    <div class="swiper-slide">
                        <div class="ebook-card">
                            <div class="ebook-image">
                                <span class="ebook-badge">🔥 پرفروش</span>
                                <span class="ebook-rank">#۴</span>
                                <span class="ebook-format">PDF</span>
                                <img src="https://via.placeholder.com/300x380/3b82f6/ffffff?text=Notes"
                                    alt="جزوه">
                                <button class="preview-btn" title="پیش‌نمایش">👁️</button>
                            </div>
                            <div class="ebook-info">
                                <div class="ebook-category">📝 جزوه دانشگاهی</div>
                                <h3 class="ebook-title">جزوه کامل ریاضی مهندسی</h3>
                                <div class="ebook-author">✍️ نویسنده: دکتر احمدی</div>
                                <div class="ebook-meta">
                                    <span class="ebook-pages">📄 ۱۸۰ صفحه</span>
                                    <span class="ebook-size">💾 ۸ مگابایت</span>
                                </div>
                                <div class="ebook-price-box">
                                    <span class="ebook-price">۴۵,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۵ -->
                    <div class="swiper-slide">
                        <div class="ebook-card">
                            <div class="ebook-image">
                                <span class="ebook-badge">🔥 پرفروش</span>
                                <span class="ebook-rank">#۵</span>
                                <span class="ebook-format">PDF</span>
                                <img src="https://via.placeholder.com/300x380/60a5fa/ffffff?text=Design"
                                    alt="طراحی">
                                <button class="preview-btn" title="پیش‌نمایش">👁️</button>
                            </div>
                            <div class="ebook-info">
                                <div class="ebook-category">🎨 کتاب هنری</div>
                                <h3 class="ebook-title">اصول طراحی گرافیک مدرن</h3>
                                <div class="ebook-author">✍️ نویسنده: آرمان موسوی</div>
                                <div class="ebook-meta">
                                    <span class="ebook-pages">📄 ۲۲۰ صفحه</span>
                                    <span class="ebook-size">💾 ۳۵ مگابایت</span>
                                </div>
                                <div class="ebook-price-box">
                                    <span class="ebook-price">۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۶ -->
                    <div class="swiper-slide">
                        <div class="ebook-card">
                            <div class="ebook-image">
                                <span class="ebook-badge">🔥 پرفروش</span>
                                <span class="ebook-rank">#۶</span>
                                <span class="ebook-format">PDF</span>
                                <img src="https://via.placeholder.com/300x380/1e3a8a/ffffff?text=Business"
                                    alt="کسب و کار">
                                <button class="preview-btn" title="پیش‌نمایش">👁️</button>
                            </div>
                            <div class="ebook-info">
                                <div class="ebook-category">💼 کتاب کسب و کار</div>
                                <h3 class="ebook-title">راهنمای جامع استارتاپ</h3>
                                <div class="ebook-author">✍️ نویسنده: علی محمدی</div>
                                <div class="ebook-meta">
                                    <span class="ebook-pages">📄 ۳۵۰ صفحه</span>
                                    <span class="ebook-size">💾 ۲۰ مگابایت</span>
                                </div>
                                <div class="ebook-price-box">
                                    <span class="ebook-price">۱۱۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن به سبد</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>

            </div>
        </div>
    </section>





    <!-- ========================================  اسلایدر پرفروش‌ترین فایل‌های تصویری  ======================================== -->
    <section class="video-slider-section">
        <div class="container">

            <!-- هدر بخش -->
            <div class="section-header">
                <h2>🎬 پرفروش‌ترین فایل‌های تصویری</h2>
                <a href="products.html?cat=video">مشاهده همه ←</a>
            </div>

            <!-- Swiper Container -->
            <div class="swiper videoSwiper">
                <div class="swiper-wrapper">

                    <!-- کارت ۱ -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <div class="video-image">
                                <span class="video-badge">🔥 پرفروش</span>
                                <span class="video-rank">#۱</span>
                                <span class="video-duration">۱۲:۴۵</span>
                                <img src="https://via.placeholder.com/400x250/1e3a8a/ffffff?text=Web+Design"
                                    alt="طراحی وب">
                                <button class="play-btn-video" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="video-info">
                                <div class="video-category">💻 برنامه‌نویسی</div>
                                <h3 class="video-title">دوره جامع طراحی وب مدرن</h3>
                                <div class="video-author">🎥 مدرس: علی محمدی</div>
                                <div class="video-meta">
                                    <span class="video-rating">⭐ ۴.۹</span>
                                    <span class="video-episodes">📺 ۴۵ قسمت</span>
                                </div>
                                <div class="video-price-box">
                                    <span class="video-price">۲۵۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۲ -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <div class="video-image">
                                <span class="video-badge">🔥 پرفروش</span>
                                <span class="video-rank">#۲</span>
                                <span class="video-duration">۱۸:۳۰</span>
                                <img src="https://via.placeholder.com/400x250/2563eb/ffffff?text=UI+UX"
                                    alt="UI/UX">
                                <button class="play-btn-video" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="video-info">
                                <div class="video-category">🎨 طراحی و گرافیک</div>
                                <h3 class="video-title">دوره تخصصی طراحی UI/UX با فیگما</h3>
                                <div class="video-author">🎥 مدرس: سارا احمدی</div>
                                <div class="video-meta">
                                    <span class="video-rating">⭐ ۴.۸</span>
                                    <span class="video-episodes">📺 ۶۰ قسمت</span>
                                </div>
                                <div class="video-price-box">
                                    <span class="video-price">۲۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۳ -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <div class="video-image">
                                <span class="video-badge">🔥 پرفروش</span>
                                <span class="video-rank">#۳</span>
                                <span class="video-duration">۲۵:۱۰</span>
                                <img src="https://via.placeholder.com/400x250/e8998d/ffffff?text=React"
                                    alt="React">
                                <button class="play-btn-video" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="video-info">
                                <div class="video-category">💻 برنامه‌نویسی</div>
                                <h3 class="video-title">دوره جامع React و Next.js</h3>
                                <div class="video-author">🎥 مدرس: رضا کریمی</div>
                                <div class="video-meta">
                                    <span class="video-rating">⭐ ۴.۹</span>
                                    <span class="video-episodes">📺 ۸۰ قسمت</span>
                                </div>
                                <div class="video-price-box">
                                    <span class="video-price">۴۵۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۴ -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <div class="video-image">
                                <span class="video-badge">🔥 پرفروش</span>
                                <span class="video-rank">#۴</span>
                                <span class="video-duration">۱۵:۲۰</span>
                                <img src="https://via.placeholder.com/400x250/3b82f6/ffffff?text=Photography"
                                    alt="عکاسی">
                                <button class="play-btn-video" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="video-info">
                                <div class="video-category">📷 عکاسی</div>
                                <h3 class="video-title">آموزش عکاسی حرفه‌ای از صفر تا صد</h3>
                                <div class="video-author">🎥 مدرس: آرمان موسوی</div>
                                <div class="video-meta">
                                    <span class="video-rating">⭐ ۴.۷</span>
                                    <span class="video-episodes">📺 ۳۵ قسمت</span>
                                </div>
                                <div class="video-price-box">
                                    <span class="video-price">۱۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۵ -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <div class="video-image">
                                <span class="video-badge">🔥 پرفروش</span>
                                <span class="video-rank">#۵</span>
                                <span class="video-duration">۲۰:۱۵</span>
                                <img src="https://via.placeholder.com/400x250/60a5fa/ffffff?text=Video+Edit"
                                    alt="ویرایش ویدیو">
                                <button class="play-btn-video" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="video-info">
                                <div class="video-category">✂️ ویرایش ویدیو</div>
                                <h3 class="video-title">آموزش پریمیر و افتر افکت حرفه‌ای</h3>
                                <div class="video-author">🎥 مدرس: مریم حسینی</div>
                                <div class="video-meta">
                                    <span class="video-rating">⭐ ۴.۸</span>
                                    <span class="video-episodes">📺 ۵۰ قسمت</span>
                                </div>
                                <div class="video-price-box">
                                    <span class="video-price">۳۸۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- کارت ۶ -->
                    <div class="swiper-slide">
                        <div class="video-card">
                            <div class="video-image">
                                <span class="video-badge">🔥 پرفروش</span>
                                <span class="video-rank">#۶</span>
                                <span class="video-duration">۱۴:۵۰</span>
                                <img src="https://via.placeholder.com/400x250/1e3a8a/ffffff?text=Marketing"
                                    alt="مارکتینگ">
                                <button class="play-btn-video" title="پیش‌نمایش">▶</button>
                            </div>
                            <div class="video-info">
                                <div class="video-category">📈 دیجیتال مارکتینگ</div>
                                <h3 class="video-title">دوره جامع دیجیتال مارکتینگ</h3>
                                <div class="video-author">🎥 مدرس: دکتر رضایی</div>
                                <div class="video-meta">
                                    <span class="video-rating">⭐ ۴.۹</span>
                                    <span class="video-episodes">📺 ۴۰ قسمت</span>
                                </div>
                                <div class="video-price-box">
                                    <span class="video-price">۳۲۰,۰۰۰ <small>تومان</small></span>
                                    <button class="btn-cart-modern">
                                        <span class="cart-icon">🛒</span>
                                        <span class="cart-text">افزودن</span>
                                        <span class="cart-ripple"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>

            </div>
        </div>
    </section>



@endsection
