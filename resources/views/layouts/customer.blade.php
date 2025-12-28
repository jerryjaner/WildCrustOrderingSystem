<!DOCTYPE html>
<html>

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
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> WildCrust </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('customer/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('customer/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('customer/css/responsive.css') }}" rel="stylesheet" />
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>


    </style>
</head>

<body>

    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('customer/images/hero-bg-2.png') }}" alt="">
        </div>
        <!-- header section strats -->
        @include('layouts.partials.customer.header')
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            @include('layouts.partials.customer.slider')
        </section>
        <!-- end slider section -->
    </div>
    <!-- food section -->
    @yield('contents')

    <!-- end food section -->

    <!-- about section -->

    <section id="about" class="about_section layout_padding">
        @include('layouts.partials.customer.about')
    </section>

    <!-- end about section -->

    <!-- book section -->
    <section id="book" class="book_section layout_padding">
        @include('layouts.partials.customer.book')
    </section>
    <!-- end book section -->

    <!-- client section -->
    <section class="client_section layout_padding-bottom">
        @include('layouts.partials.customer.client')
    </section>
    <!-- end client section -->

    <!-- footer section -->
    @include('layouts.partials.customer.footer')
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('customer/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('customer/js/bootstrap.js') }}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('customer/js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->


</body>

</html>


<script>
    // Select all links that start with #
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const target = document.querySelector(this.getAttribute('href'));
            if (!target) return;

            // Animate scroll
            const targetPosition = target.offsetTop;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            const duration = 500; // duration in ms
            let start = null;

            function step(timestamp) {
                if (!start) start = timestamp;
                const progress = timestamp - start;
                const percent = Math.min(progress / duration, 1);
                window.scrollTo(0, startPosition + distance * percent);
                if (progress < duration) {
                    window.requestAnimationFrame(step);
                }
            }

            window.requestAnimationFrame(step);
        });
    });
</script>
