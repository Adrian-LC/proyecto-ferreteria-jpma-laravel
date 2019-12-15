<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'JPMA') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('img/icono_carrito/style.css') }}">
    <link rel="icon" href="{{ asset('img/logo.ico') }}">
</head>
<body>
    <div id="app" class="container-fluid p-0">
      <!-- header -->
      @include('parts.header')
      <!-- contenido -->
      <section class="_yield p-2">
        @yield('content')
      </section>
      <!-- footer -->
      @include('parts.footer')
    </div>
    @yield('script')
    <script src="{{ asset('js/productCategories.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/countCart.js') }}" charset="utf-8"></script>
</body>
</html>
