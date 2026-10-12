<!DOCTYPE html>
<html lang="fa" dir="rtl">
 @include('admin.layouts.head-tag')

<body>
    <div class="app">
        @include('admin.layouts.partials.sidebar')
        <main class="main">
            @yield('content')
        </main>
    </div>

     @include('admin.layouts.scripts')
</body>

</html>
