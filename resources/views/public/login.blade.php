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

                                   <!---- allert message Start -->
                                   @if(Session::has('flash_message_success'))
                                   <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                       <div class="d-flex align-items-center">
                                           <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
                                           </div>
                                           <div class="ms-3">
                                               <h6 class="mb-0 text-white" style="text-align:center;">Success Alerts</h6>
                                               <hr>
                                               <div class="text-white" style="text-align:center;">{!! session('flash_message_success') !!} </div>
                                           </div>
                                       </div>
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>
                                   @endif

                                   @if(Session::has('flash_message_error'))
                                   <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                                       <div class="d-flex align-items-center">
                                           <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
                                           </div>
                                           <div class="ms-3">
                                               <h6 class="mb-0 text-white">Error Alerts</h6>
                                               <div class="text-white">{!! session('flash_message_error') !!}</div>
                                           </div>
                                       </div>
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                   </div>
                                   @endif
                                   <!---- allert message End -->

                            <form method="POST" action="{{ url('/en') }}/<?php if(isset($reff_id)){ if($reff_id!=''){ echo $reff_id ;}}?>">
                                @csrf
                                <div class="mb-2 row">

                                    <div class="col-12 col-sm-12">
                                        <?php   if(isset($checkReffID)){ 
                                                    if($checkReffID==0){ echo '<div class="error-login-id">Invalid Upline ID</div>';}
                                                }
                                        ?>
                                        <input id="wallet_address" type="hidden"  class="form-control log-text @error('wallet_address') is-invalid @enderror" placeholder="Wallet Address" name="wallet_address" value="T9yYDKWjQNY6SDM1W5J3eHTbKkv1MG7AHz" required autocomplete="wallet_address" autofocus>

                                        <input id="reff_id" type="text"  class="form-control log-text @error('reff_id') is-invalid @enderror" placeholder="Referral ID" name="reff_id" value="<?php if(isset($reff_id)){ if($reff_id!=''){ echo $reff_id ;} } elseif(isset($_POST['reff_id'])){ echo old('reff_id'); } ;?>" required autocomplete="reff_id" autofocus>

                                        @error('reff_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>



                                    <div class="col-12 col-sm-12">
                                        
                                        <button type="submit" style="margin-top: 30px;" class="btn-white" <?php  if(isset($checkReffID)){ if($checkReffID==0){ echo "disabled";}} ?>>Registration</button>
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
                      
                                <div class="mb-2 row">
                                <form method="POST" action="#">
                                @csrf
                                    <div class="col-12 col-sm-12">
                                        <button type="button" class="btn-login">Automatic login</button>
                                    </div>
                                </form>

                                <div class="col-12 col-sm-12">
                                @if(Session::has('flash_message_errors'))
                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
                                    <div class="d-flex align-items-center">
                                       
                                        <div class="ms-3">
                                            <div class="text-white">{!! session('flash_message_errors') !!}</div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                            </div>
                                <!---- allert message End -->
                                <form method="POST" action="{{ route('viewing') }}">
                                    @csrf
                                    <div class="col-12 col-sm-12">
                                        
                                     
                                            <input id="user_id" type="text" class="form-control log-text @error('user_id') is-invalid @enderror" placeholder="User ID" name="user_id" value="<?php if(isset($user_id)) { echo $user_id;}?>" required  autofocus>
                                           
                                            @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <div class="col-12 col-sm-12">
                                        <button type="submit" class="btn-viewing">Viewing</button>
                                    </div>
                                </form>
                                </div>
                           
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