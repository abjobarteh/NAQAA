<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CoreUI CSS -->
 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">
 <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
 <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
 <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
 <!-- Font Awesome -->
<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
 @yield('styles')


 <title>@yield('title')</title>
 </head>
 <body class="c-app">
    @include('partials.portal.sidebar')
    <div class="c-wrapper c-fixed-components">
      @include('partials.portal.header') 
      <div class="c-body">
         <main class="c-main">
            @yield('content')
         </main>
      </div>
    </div>

 <!-- Optional JavaScript -->
 <!-- Popper.js first, then CoreUI JS -->
 <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.bundle.min.js"></script>
 <!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
 @include('sweetalert::alert')
 @yield('scripts')
 </body>
</html>