<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('admin_assets/img/fav.png') }}">
        <!-- Author Meta -->
        <meta name="author" content="buddy">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>Buddy</title>

        <link rel="stylesheet" href="{{ asset('join_assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/vendor/animate/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/vendor/animsition/css/animsition.min.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/vendor/select2/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/vendor/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/css/util.css') }}">
        <link rel="stylesheet" href="{{ asset('join_assets/css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @yield('css')

        <!-- CSS & BOOTSTRAP -->
    </head>

    <body id="body">
        {{-- @include('partials.svg') --}}

        @yield('content')

        <!-- all js here -->
        <script src="{{ asset('admin_assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/popper.js') }}"></script>
        <script src="{{ asset('admin_assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('admin_assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('admin_assets/js/plugins.js') }}"></script>
        <script src="{{ asset('admin_assets/js/typed.js') }}"></script>
        <script src="{{ asset('admin_assets/js/main.js') }}"></script>
        <script src="{{ asset('admin_assets/js/buddy.js') }}"></script>
        <script src="{{ asset('admin_assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if(Session::has('message'))
          <script>
            Swal.fire({
              icon: 'success',
              title: 'Oops...',
              text: '{{ session('message') }}',
            })
          </script>
        @endif
        @yield('js')
    </body>
</html>
