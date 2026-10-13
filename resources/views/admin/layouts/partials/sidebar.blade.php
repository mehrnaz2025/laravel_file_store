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

        <!--  بخش محتوا  -->
            <div class="sidebar-group-title">
                <span class="group-icon">&#x1F4DD;</span>
                <span class="group-text">بخش محتوا</span>
            </div>
            <div class="menu-item">
                <span class="icon">&#x1F4D1;</span>
                <a href="{{ route('admin.content.menu.index') }}" style="text-decoration: none ; color:antiquewhite">منوها</a>
            </div>

    </nav>
</aside>
