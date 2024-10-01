@extends('layouts.landing')

@section('content')
    <!-- START SECTION TOP -->
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <h1>About Us</h1>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li> / About</li>
                    </ul>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->

    <!-- START TOP PROMO FEATURES -->
    <section class="tp_feature">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="single_tp">
                        <img src="https://smpmaarifimogiri.sch.id/wp-content/uploads/2024/03/Kurikulum-Nasional-2024.png"
                            alt="" srcset="" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="single_tp">
                        <img src="https://png.pngtree.com/png-vector/20230725/ourlarge/pngtree-project-p5-official-logo-strengthening-the-profile-of-pancasila-students-front-vector-png-image_8362620.png"
                            alt="" srcset="" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s"
                    data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="single_tp">
                        <img src="https://waspada.co.id/wp-content/uploads/2024/02/kurikulum-nasional.jpg" alt=""
                            srcset="" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END TOP PROMO FEATURES -->

    <!-- START ABOUT US HOME ONE -->
    <section class="ab_one section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="ab_img">
                        <img src="{{ asset('assets-landing/images/IMG-20240911-WA0019.jpg') }}" class="img-fluid"
                            alt="image">
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="ab_content">
                        <h2>Evaluasi Pembelajaran
                            <u><span>SMP ISLAM PLUS AS-SA’ADATAIN</span></u>
                        </h2>
                        <p><strong>Di SMP Islam Plus As-Sa’adatain, evaluasi pembelajaran FORMATIF dilakukan dengan
                                Penilaian Harian (PH), Tugas, Praktek, Proyek, dan Portofolio. Sedangkan SUMATIF dilakukan
                                dengan Sumatif Tengah Semester (STS), Sumatif Akhir Semester (SAS), Sumatif Akhir Tahun
                                (SAT): 7 & 8, Sumatif Akhir Jenjang (SAJ): 9, Ujian Komprehensif Dirasat
                                Islamiyyah.</strong></p>
                        <a class="btn_one" href="{{ route('kurikulum') }}">Read More us</a>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END ABOUT US HOME ONE -->

    <!-- START WHY CHOOSE US-->
    <section class="marketing_content_area section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Mata Pelajaran</h2>
                <p>Daftar <span><u>Mata Pelajaran</u></span> </p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Matematika</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">IPA</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Bahasa Indonesia</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Bahasa Inggris</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">IPS</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->

                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">PKN</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Seni Budaya</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Prakarya / TIK</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Penjasorkes</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">B. Sunda</a></h2>
                        </div>
                        <p>Umum.</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">B. Arab</a></h2>
                        </div>
                        <p>Dirasah Islamiyyah (Muatan Lokal Islami ).</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Praktik Ibadah</a></h2>
                        </div>
                        <p>Dirasah Islamiyyah (Muatan Lokal Islami ).</p>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_feature_one">
                        <div class="sf_top">
                            <span class="ti-book ss_one"></span>
                            <h2><a href="#" target="_blank">Baca Tulis Qur’an (BTQ)</a></h2>
                        </div>
                        <p>Dirasah Islamiyyah (Muatan Lokal Islami ).</p>
                    </div>
                </div><!-- END COL -->

            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
    </section>
    <!-- END WHY CHOOSE US -->

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
@endsection
