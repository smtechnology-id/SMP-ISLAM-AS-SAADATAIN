@extends('layouts.landing')

@section('content')
    <!-- START HOME -->
    <section id="home" class="home_bg"
        style="background-image: url({{ asset('assets-landing/images/banner/home.png') }});  background-size:cover; background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="home_content">
                        <p>Selamat Datang</p>
                        <h1>SMP Islam Plus <span>As-Sa’adatain</span></h1>
                    </div>
                    <div class="home_btn">
                        <a href="{{ route('register') }}" class="cta"><span>Pendaftaran Siswa Baru</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="home_me_img">
                        <img src="{{ asset('assets-landing/images/gambar sekolah.jpg') }}" class="img-fluid" alt=""
                            style="width: 100vw; height: 100vh; object-fit: cover; object-position: center;" />
                        <div class="home_ps">
                            <img src="{{ asset('assets-landing/images/icon/user2.svg') }}" alt="" />
                            <h2>68+</h2>
                            <span>Siswa Aktif</span>
                        </div>
                    </div>
                </div><!-- END COL-->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END  HOME -->

    <!-- START ABOUT US HOME ONE -->
    <section class="ab_one section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="ab_img">
                        <img src="{{ asset('assets-landing/images/banner2.jpg') }}" class="img-fluid" alt="image">
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="ab_content">
                        <h2>Tak Kenal maka Tak <u><span>Sayang </span></u></h2>
                        <p>SMPI Plus As-Sa’adatain didirikan pada tanggal 18 mei 2013, Beralamat di Jl. Pintu Air III No. 98
                            RT 28 RW 08 Kelurahan Gandul Kecamatan Cinere Kota Depok
                        </p>
                    </div>
                    <div class="abmv">
                        <span class="ti-medall"></span>
                        <h4>“Disiplin,Mandiri,Kreatif”</h4>
                        <p>Jargon</p>
                    </div>
                    <div class="abmv">
                        <span class="ti-wand"></span>
                        <h4>SMP Islam Plus As-Sa’adatain
                            Bisa…Pasti Bisa…Insya Alloh..Bisa!!</h4>
                        <p>Yell-Yell</p>
                    </div>
                    <a class="btn_one" href="about.html">Discover More</a>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END ABOUT US HOME ONE -->

    <!-- START COUNTER -->
    <section id="counts" class="counts section-padding">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Some Fun Fact</h2>
                <p>Our Great <span><u>Achievement</u></span></p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="ti-face-smile"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="68" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Enrolled Students</p>
                        </div>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="ti-files" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Class</p>
                        </div>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-4 col-md-6">
                    <div class="count-box">
                        <i class="ti-user" style="color: #bb0852;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="14" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Winning Award</p>
                        </div>
                    </div>
                </div><!--- END COL -->

            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END COUNTER -->
    <!-- START TEAM-->
    <section class="team_home_area section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Dewan Guru</h2>
                <p>Para Dewan <span><u>Guru</u></span> Di SMP AS-SA’ADATAIN</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single-team-home">
                        <div class="img"><img src="{{ asset('assets-landing/images/guru/Picture2.jpg') }}"
                                class="img-fluid" alt=""></div>
                        <div class="team-content-home">
                            <h3>ERIS NUSYARAH, M.Pd
                            </h3>
                            <p>Panggilan Umi Eris</p>
                            <div class="sth_det">
                                <span class="ti-file"> <u>KONSELOR</u></span>
                                <span class="ti-user"> <u>GURU BAHASA SUNDA
                                    </u></span>
                            </div>
                            <ul class="social-home">
                                <li><a href="#" class="facebook-home"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-home"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="instagram-home"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single-team-home">
                        <div class="img"><img src="{{ asset('assets-landing/images/guru/Picture3.jpg') }}"
                                class="img-fluid" alt=""></div>
                        <div class="team-content-home">
                            <h3>AHMAD KOSASI, M.S.I
                            </h3>
                            <p>Panggilan Abi Ahmad </p>
                            <div class="sth_det">
                                <span class="ti-file"> <u>WAKASEK SARANA & PRASARANA</u></span>

                            </div>
                            <ul class="social-home">
                                <li><a href="#" class="facebook-home"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-home"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="instagram-home"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single-team-home">
                        <div class="img"><img src="{{ asset('assets-landing/images/guru/Picture4.jpg') }}"
                                class="img-fluid" alt=""></div>
                        <div class="team-content-home">
                            <h3>ARUM INDAH WAHYUNI, S.Pd
                            </h3>
                            <p>Panggilan Umi Arum </p>
                            <div class="sth_det">
                                <span class="ti-file"> <u>WAKAUR. KURIKULUM</u></span>

                            </div>
                            <ul class="social-home">
                                <li><a href="#" class="facebook-home"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-home"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="instagram-home"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single-team-home">
                        <div class="img"><img src="{{ asset('assets-landing/images/guru/Picture5.png') }}"
                                class="img-fluid" alt=""></div>
                        <div class="team-content-home">
                            <h3>MIFTAHUL JANNAH, S. Ak
                            </h3>
                            <p>Panggilan Umi Miftah</p>
                            <div class="sth_det">
                                <span class="ti-file"> <u>WAKAUR. KEUANGAN </u></span>

                            </div>
                            <ul class="social-home">
                                <li><a href="#" class="facebook-home"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-home"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="instagram-home"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END TEAM -->

    <!-- START EVENT -->
    <section class="our-event section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Mereka?</h2>
                <p>Apa Kata Mereka Tentang <span><u>SMP AS-SA’ADATAIN</u></span></p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="event-slide">
                        <div class="event-img">
                            <iframe src="https://drive.google.com/file/d/1Ra4Ej4gSxxN-u11WgntJToScFhEBL_Q6/preview"
                                width="100%" height="480" allow="autoplay"></iframe>
                            <div class="event-date">
                                <span class="date">Dewi Jayanti</span>
                                <span class="month">2024</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><a href="event.html">Ucapan Dari Dewi Jayanti</a></h3>
                        </div>
                    </div><!-- END EVENT -->
                </div><!-- END COL -->
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="event-slide">
                        <div class="event-img">
                            <iframe src="https://drive.google.com/file/d/16Pg7v4CsbY_z6XRxvzbtnj4pP2-qW06s/preview"
                                width="100%" height="480" allow="autoplay"></iframe>
                            <div class="event-date">
                                <span class="date">Khutbatul Ikhtikam</span>
                                <span class="month">2018</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><a href="event.html">Acara Khutbatul Ikhtikam</a></h3>
                        </div>
                    </div><!-- END EVENT -->
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END EVENT -->

    <!-- START COMPANY PARTNER LOGO  -->
    <div class="partner-logo section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="partner_title">
                        <h3>SMP Islam Plus As-Sa’adatain Bisa…Pasti Bisa…Insya Alloh..Bisa!!</h3>
                    </div>
                    
                </div><!-- END COL  -->
            </div><!--END  ROW  -->
        </div><!-- END CONTAINER  -->
    </div>
    <!-- END COMPANY PARTNER LOGO -->

    <!-- START COURSE PROMOTION -->
    <section class="course_promo section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="cp_content">
                        <h4>Best Online Learning Platform</h4>
                        <h2>AKTIVITAS  <span><u>KAMI</u></span> DI SEKOLAH </h2>
                        <p>From blogs to emails to ad copies, auto-generate catchy, original, and high-converting copies in
                            popular tones languages.</p>
                        <ul>
                            <li><span class="ti-check"></span>Dari jam 07.00</li>
                            <li><span class="ti-check"></span>Sampai jam 16.00</li>
                            <li><span class="ti-check"></span>(FULL DAY SCHOOL)</li>
                        </ul>
                    </div>
                    
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="cp_img">
                        <iframe src="https://drive.google.com/file/d/1aBn2_97mgBIwSR4TKMu8mwAy5_Ipslf_/preview" width="100%" height="480" allow="autoplay"></iframe>
                        <!-- <div class="wc_year">
                   <h3>20 Years of Experience <br />from 2002</h3>
                  </div> -->
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END COURSE PROMOTION -->

    <!-- START NEWSLETTER -->
    <section class="newsletter_area section-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-6 offset-lg-3 col-sm-12 col-xs-12">
                    <div class="subs_form">
                        <h3>Kontak Kami</h3>
                        <p>Jl. Pintu Air III No. 98 RT 28 RW 08 Kelurahan Gandul Kecamatan Cinere Kota Depok</p>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END NEWSLETTER -->
@endsection
