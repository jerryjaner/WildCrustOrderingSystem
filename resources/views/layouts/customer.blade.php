<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="shortcut icon" href="{{ asset('customer/images/favicon.png') }}" type="image/x-icon">

    <title>@yield('title', 'WildCrust')</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="{{ asset('customer/css/bootstrap.css') }}" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('customer/css/font-awesome.min.css') }}" />

    <!-- Owl Slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- Nice Select -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />

    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('customer/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('customer/css/custom.css') }}" />


    @stack('styles')
</head>

<body>

    <!-- Hero & Header -->
    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('customer/images/hero-bg-2.png') }}" alt="">
        </div>

        @include('layouts.partials.customer.header')

        <section class="slider_section">
            @include('layouts.partials.customer.slider')
        </section>
    </div>

    <!-- Main Content -->
    @yield('contents')

    <!-- About Section -->
    <section id="about" class="about_section layout_padding">
        @include('layouts.partials.customer.about')
    </section>

    <!-- Book Section -->
    <section id="book" class="book_section layout_padding">
        @include('layouts.partials.customer.book')
    </section>

    <!-- Client Section -->
    <section class="client_section layout_padding-bottom">
        @include('layouts.partials.customer.client')
    </section>

    <!-- Footer -->
    @include('layouts.partials.customer.footer')

    <!-- jQuery -->
    <script src="{{ asset('customer/js/jquery-3.4.1.min.js') }}"></script>
     <!-- Popper JS (required for Bootstrap 4) -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

    <!-- Bootstrap 4 JS -->
    <script src="{{ asset('customer/js/bootstrap.js') }}"></script>

    <!-- Owl Slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Isotope JS -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>

    <!-- Nice Select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=myMap" async defer></script>

    <!-- Custom JS -->
     <script src="{{ asset('customer/js/custom.js') }}"></script>

    <!-- CSRF Setup -->
    <script>
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        // Smooth Scroll for Anchor Links
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            let target = $(this.getAttribute('href'));
            if(target.length){
                $('html, body').animate({ scrollTop: target.offset().top }, 500);
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
