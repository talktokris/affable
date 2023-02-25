<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>AFFABLE USDT</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg')}}" />

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
@include("public.layouts.login_header");
     


    </header>
    <!-- End Header Area -->



    <!----- DUEL LINE GLOBAL COMMUNITY START------>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-12 login-section">

                    <div class="login-area">
                        <div class="login-header">
                            <h4>Registration</h4>
                            <hr>
                            <p>
                                Join If You Are Not Yet With Us: Registration In RAFFLESLOT
                            </p>
                        </div>
                        <div class="login-form-div">
                            <form>
                                <div class="mb-2 row">

                                    <div class="col-12 col-sm-12">
                                        <button type="submit" class="btn-login">UPLINE</button>
                                    </div>



                                    <div class="col-12 col-sm-12">
                                        <button type="submit" class="btn-white">Registration</button>
                                    </div>
                                    <hr>
                                    <p class="login-bottom-text">
                                        Registration Required 10 BUSD In Your Wallet
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 login-section">
                    <div class="login-area">
                        <div class="row">
                            <div class="login-header">
                                <h4>Login & Viewing</h4>
                                <hr>
                                <p> To View Your AccountSpecify ID Or BUSD Wallet </p>
                            </div>
                        </div>
                        <div class="login-form-div">
                            <form>
                                <div class="mb-2 row">

                                    <div class="col-12 col-sm-12">
                                        <button type="submit" class="btn-login">Automatic login</button>
                                    </div>

                                    <div class="col-12 col-sm-12">
                                        <input type="text" class="form-control log-text" id="inputPassword"
                                            placeholder="User ID">
                                    </div>

                                    <div class="col-12 col-sm-12">
                                        <button type="submit" class="btn-viewing">Viewing</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <!----- DUEL LINE GLOBAL COMMUNITY END------>







    <!-- Start Footer Area -->
    @include("public/layouts/footer")

    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js')}}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.2/r-2.4.0/datatables.min.js"></script>
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
</body>

</html>