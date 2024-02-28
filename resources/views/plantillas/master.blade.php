<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">
      
        <title>@yield("title")</title>
      
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        <!-- End fonts -->
        
        <!-- CSRF Token -->
        <meta name="_token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
      
        <!-- plugin css -->
        <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
        <!-- end plugin css -->
      
        @stack('plugin-styles')
      
          <!-- common css -->
          <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
          <!-- end common css -->
      
        @stack('style')
      </head>
      <body class="sidebar-dark header-dark">
        <script src="{{ asset('assets/js/spinner.js') }}"></script>

        <div class="main-wrapper" id="app">
          @include('plantillas.sidebar')
          <div class="page-wrapper">
            @include('plantillas.header')
            <div class="page-content">
              @yield('content')
            </div>
          </div>
        </div>

        <!-- base js -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <!-- end base js -->

        <!-- plugin js -->
        @stack('plugin-scripts')
        <!-- end plugin js -->

        <!-- common js -->
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <!-- end common js -->

        @stack('custom-scripts')
      </body>
</html>