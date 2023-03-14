<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>AFFABLE USDT</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.13.2/r-2.4.0/datatables.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <?php // include("includes/header_top.php") ; ?>
        <!-- End Topbar -->
        <!-- Start Header Middle -->


        @include("public.layouts.header")

        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class=" row align-items-center">
                <div class="col-12">
                    @include("public.layouts.menu")
               
                </div>

            </div>
        </div>
        <!-- End Header Bottom -->

    </header>
    <!-- End Header Area -->


    @yield('contents')


    <!-- Start Footer Area -->
    @include("public.layouts.footer")
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <?php /* <script src="https://code.jquery.com/jquery-3.1.1.min.js"> */ ?>
       <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
   <?php /*  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> */?>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <?php /*<script src="{{ asset('assets/js/jquery-3.6.4.min.js')}}"></script> */ ?>
    <script src="{{ asset('assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/js/tronweb.js')}}"></script>
    <script src="{{ asset('assets/js/script.js')}}"></script>

  <?php /*  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/r-2.4.0/datatables.min.js"></script>
    <script type="text/javascript">
    //========= Hero Slider
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });

    //======== Brand Slider
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1,
            },
            540: {
                items: 3,
            },
            768: {
                items: 5,
            },
            992: {
                items: 6,
            }
        }
    });
    </script>
    */?>
</body>

</html>