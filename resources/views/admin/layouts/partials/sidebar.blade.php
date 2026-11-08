<aside class="sidebar">
    <div class="logo">
        <h1>💎 پنل مدیریت</h1>
        <p>فروشگاه فایل الماس</p>
    </div>
    <nav>

        <!-- داشبورد -->

        <div class="menu-item">
            <span class="icon">📊</span>
            <a href="{{ route('admin.dashboard') }}" style="text-decoration: none ; color:antiquewhite">داشبورد</a>
        </div>


        <!--  بخش فروشگاه  -->
        <div class="sidebar-group-title">
            <span class="group-icon">📦</span>
            <span class="group-text">بخش فروشگاه</span>
        </div>

        <div class="menu-item">
            <span class="icon">&#x1F4C1;</span>
            <a href="{{ route('admin.market.category.index') }}" style="text-decoration: none ; color:antiquewhite">دسته
                بندی</a>
        </div>

        <div class="menu-item">
            <span class="icon d-flex" style="font-size: 11px;">

                <span class="">&#128214;</span>/<span class="">&#127911;</span>
            </span>
            <a href="{{ route('admin.market.product.index') }}"
                style="text-decoration: none ; color:antiquewhite;width:100%"> محصول </a>
        </div>



        <!--  بخش تخفیفات  -->
        <div class="sidebar-group-title">
            <span class="group-icon">
                <span> &#127873;</span>
            </span>
            <span class="group-text"> بخش تخفیفات</span>
        </div>

        <div class="menu-item">

            <span class="icon d-flex" style="font-size: 11px;">

                <span class="" style="font-size:1.2rem">&#127903;</span>

            </span>
            <a href="{{ route('admin.market.coupan.index') }}" style="text-decoration: none ; color:antiquewhite"> تخفیف
                کوپنی </a>
        </div>



        <!--  بخش محتوا  -->
        <div class="sidebar-group-title">
            <span class="group-icon">&#x1F4DD;</span>
            <span class="group-text">بخش محتوا</span>
        </div>
        <div class="menu-item">
            <span class="icon">&#x1F4D1;</span>
            <a href="{{ route('admin.content.menu.index') }}"
                style="text-decoration: none ; color:antiquewhite">منوها</a>
        </div>

        <div class="menu-item">
            <span class="" style="font-size:25px;color:white;font-weight:bolder ">&#127991;</span>
            <a href="{{ route('admin.content.tag.index') }}" style="text-decoration: none ;color:antiquewhite">تگ ها</a>
        </div>

        <div class="menu-item">
            <span class="" style="font-size:20px;color:white;">&#128276;</span>
            <a href="{{ route('admin.content.banner.index') }}" style="text-decoration: none ;color:antiquewhite">بنر
                ها</a>
        </div>

        <div class="menu-item">
            <span class="" style="font-size:20px;color:white;"> &#128173;</span>
            <a href="{{ route('admin.market.comment.index') }}" style="text-decoration: none ;color:antiquewhite">نظرات</a>
        </div>


        <!--  بخش کاربران  -->
        <div class="sidebar-group-title">
            <span class="group-icon" style="font-size:23px;">&#x1F465;</span>
            <span class="group-text">بخش کاربران</span>
        </div>

        <div class="menu-item">
            <span class="icon" style="font-size:18px;"> &#x1F464; </span>
            <a href="#" style="text-decoration: none ; color:antiquewhite">مدیران  </a>
        </div>


        <div class="menu-item">
            <span class="icon" style="font-size:18px;"> &#x1F464; </span>
            <a href="#" style="text-decoration: none ; color:antiquewhite">کاربران</a>
        </div>

        <div class="menu-item">
            <span style="font-size:10px;color: #f59e0b;vertical-align: middle;">
                <span class="icon" style="font-size:14px;"> &#128272;</span>
                <span class="icon" style="font-size:8px;"> &#128273; </span>
            </span>
            <a href="{{ route('admin.user.permission.index') }}"  style="text-decoration: none ; color:antiquewhite">مجوزها</a>
        </div>

        <div class="menu-item">
            <span class="icon" style="font-size:20px;">&#127917; </span>
            <a href="{{ route('admin.user.role.index') }}" style="text-decoration: none ; color:antiquewhite">نقش ها</a>
        </div>

        <div class="menu-item">
            <span class="icon" style="font-size:20px;">&#x1F4B0; </span>
            <a href="{{ route('admin.user.wallet.index') }}" style="text-decoration: none ; color:antiquewhite"> کیف پول</a>
        </div>


        <div class="menu-item">
            <span class="icon" style="font-size:20px;">&#x1F4C6; </span>
            <a href="{{ route('admin.user.wallet-transactions.index') }}"  style="text-decoration: none ; color:antiquewhite">  تاریخچه تراکنش ها </a>
        </div>



        <!--  بخش تیکت ها  -->
        <div class="sidebar-group-title">
            <span class="group-icon" style="font-size:18px;">&#128232;</span>
            <span class="group-text">بخش تیکت ها</span>
        </div>

        <div class="menu-item">
            <span class="icon" style="font-size:22px;">  &#128451; </span>
            <a href="{{ route('admin.ticket.ticket-category.index') }}" style="text-decoration: none ;color:antiquewhite">دسته بندی </a>
        </div>


        <div class="menu-item">
            <span class="icon" style="font-size:20px;"> &#128681; </span>
            <a href="{{ route('admin.ticket.ticket-priority.index') }}" style="text-decoration: none ;color:antiquewhite"> اولویت تیکت </a>
        </div>

        <div class="menu-item">
            <span class="icon" style="font-size:22px;"> &#128104;&#8205;&#128188; </span>
            <a href="{{ route('admin.ticket.ticket-admin.index') }}" style="text-decoration: none ;color:antiquewhite">   ادمین تیکت </a>
        </div>

       <div class="menu-item">
            <span class="icon" style="font-size:22px;"> &#x1F3AB; </span>
            <a href="{{ route('admin.ticket.ticket.index') }}" style="text-decoration: none ;color:antiquewhite">    تیکت ها</a>
        </div>


        <!--  بخش تنظیمات  -->
        <div class="sidebar-group-title">
            <span class="group-icon" style="font-size: 20px;">&#9965;</span>
            <span class="group-text">بخش تنظیمات</span>
        </div>
        <div class="menu-item">
            <span class="icon">&#9965;</span>
            <a href="{{ route('admin.setting.index') }}" style="text-decoration: none ; color:antiquewhite;"> تنظیمات
            </a>
        </div>

    </nav>
</aside>
