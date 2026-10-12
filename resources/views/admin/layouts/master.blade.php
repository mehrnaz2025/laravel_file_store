<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
        @include('admin.layouts.head-tag')
</head>
<body>
<div class="app">

     @include('admin.layouts.partials.sidebar')
  <main class="main">

     @include('admin.layouts.partials.header')

     @yield('content')
  </main>
</div>


    @include('admin.layouts.scripts')
    {{-- @include('admin.alerts.sweetalert.error')
    @include('admin.alerts.sweetalert.success') --}}
</body>
</html>
