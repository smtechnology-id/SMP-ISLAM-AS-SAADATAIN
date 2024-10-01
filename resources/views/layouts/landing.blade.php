<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Selamat Datang di Website Resmi SMP ISLAM PLUS AS-SA'ADATAIN">
    <meta name="keywords"
        content="smp, islam, plus, as-sa'adatain, dewan guru, kurikulum, kegiatan, contact">
    <meta name="author" content="theme_ocean">
    <!-- SITE TITLE -->
    <title>Website Resmi SMP ISLAM PLUS AS-SA'ADATAIN</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}" />
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/fonts/themify-icons.css') }}">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="{{ asset('assets-landing/owlcarousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-landing/owlcarousel/css/owl.theme.css') }}">
    <!--slicknav Css-->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/slicknav.css') }}">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/magnific-popup.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/animate.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets-landing/css/style.css') }}" />
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- START PRELOADER -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- END PRELOADER -->

    <!-- START NAVBAR -->
    <div id="navigation" class="fixed-top navbar-light bg-faded site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="site-logo">
                        <a href="index.html"><img src="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}" alt=""
                                style="width: 70px; height: 70px;"></a>
                    </div>
                </div><!--- END Col -->

                <div class="col-lg-6 col-md-9 col-sm-8 ">
                    <div class="header_right ">
                        <nav id="main-menu" class="ms-auto">
                            <ul>
                                <li><a class="nav-link" href="{{ route('index') }}">Home</a></li>
                                <li><a class="nav-link" href="{{ route('visi-misi') }}">About Us</a></li>
                                <li><a class="nav-link" href="{{ route('dewan-guru') }}">Dewan Guru</a></li>
                                <li><a class="nav-link" href="{{ route('kurikulum') }}">Kurikulum</a></li>
                                <li><a class="nav-link" href="{{ route('kegiatan') }}">Kegiatan</a></li>
                                <li><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                        <div id="mobile_menu"></div>
                    </div>
                </div><!--- END Col -->
                <div class="col-lg-4 col-md-3 col-sm-8">
                    <div class="call_to_action">
                        <a class="btn_two" href="{{ route('login') }}">Login</a>
                        <a class="btn_one" href="{{ route('register') }}">Pendaftaran Siswa Baru</a>
                    </div><!--- END SOCIAL PROFILE -->
                </div><!--- END Col -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
    <!-- END NAVBAR -->
    @yield('content')
    <!-- START FOOTER -->
    <div class="footer section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="single_footer">
                        <a href="index.html"><img src="{{ asset('assets/images/LOGO-SMP-ASSDAT.png') }}"
                                alt=""></a>
                            <p>SMP ISLAM PLUS AS-SA'ADATAIN</p>
                    </div>
                    
                </div><!--- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="single_footer">
                        <h4>Links</h4>
                        <ul>
                            <li><a href="{{ route('visi-misi') }}">About Us dan Visi Misi</a></li>
                            <li><a href="{{ route('dewan-guru') }}">Dewan Guru</a></li>
                            <li><a href="{{ route('kurikulum') }}">Kurikulum</a></li>
                            <li><a href="{{ route('kegiatan') }}">Kegiatan</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div><!--- END COL -->
                
                <div class="col-lg-4 col-sm-6 col-xs-12">
                    <div class="single_footer">
                        <h4>Contact Info</h4>
                        <div class="sf_contact">
                            <span class="ti-mobile"></span>
                            <h3>Phone number</h3>
                            <p>+88 457 845 695</p>
                        </div>
                        <div class="sf_contact">
                            <span class="ti-email"></span>
                            <h3>Email Address</h3>
                            <p>example#yourmail.com</p>
                        </div>
                        <div class="sf_contact">
                            <span class="ti-map"></span>
                            <h3>Office Address</h3>
                            <p>California, USA</p>
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
            <div class="row fc">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="footer_copyright">
                        <p>&copy; 2023. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="footer_menu">
                        <ul>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div><!-- END COL -->
            </div>
        </div><!--- END CONTAINER -->
    </div>
    <!-- END FOOTER -->

    <!-- Latest jQuery -->
    <script src="{{ asset('assets-landing/js/jquery-1.12.4.min.js') }}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{ asset('assets-landing/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{ asset('assets-landing/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- jquery.slicknav -->
    <script src="{{ asset('assets-landing/js/jquery.slicknav.js') }}"></script>
    <!-- magnific-popup js -->
    <script src="{{ asset('assets-landing/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- jquery mixitup min js -->
    <script src="{{ asset('assets-landing/js/jquery.mixitup.js') }}"></script>
    <!-- scrolltopcontrol js -->
    <script src="{{ asset('assets-landing/js/scrolltopcontrol.js') }}"></script>
    <!-- jquery purecounter vanilla js -->
    <script src="{{ asset('assets-landing/js/purecounter_vanilla.js') }}"></script>
    <!-- WOW - Reveal Animations When You Scroll -->
    <script src="{{ asset('assets-landing/js/wow.min.js') }}"></script>
    <!-- scripts js -->
    <script src="{{ asset('assets-landing/js/scripts.js') }}"></script>
</body>

</html>
