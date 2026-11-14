<!DOCTYPE html>
<html lang="fa" dir="rtl">


@include('app.layouts.head-tag')

<body>

    <!-- 1. Top Bar -->
    @include('app.layouts.partials.top-bar')

    <!-- 2. Main Header -->
    @include('app.layouts.partials.header')


         @yield('content')

    <!-- 7. Footer -->

    @include('app.layouts.partials.footer')

    @include('app.layouts.scripts')



</body>

</html>
