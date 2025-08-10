@php
    use App\Models\Data\Quiz;
@endphp
<div>
    @include('components.navbar')
    <!-- Start Banner Area  -->
    <div class="rbt-banner-area rbt-banner-18" id="home_section">
        <div class="wrapper">
            <div class="shape-wrap">
                <div class="shadow-1">
                </div>
                <div class="shadow-2">
                </div>
                <div class="shadow-3">
                </div>
                <div class="shadow-4">
                </div>
                <div class="glass">
                    <img src="{{ asset('assets/images/shape/i-glass.png') }}" alt="Banner Shape">
                </div>
                {{-- <div class="union">
                    <img src="{{ asset('assets/images/shape/o-union.png') }}" alt="Banner Shape">
                </div> --}}
                <div class="dot-shape-1 scene">
                    <span data-depth="1">
                        <img src="{{ asset('assets/images/shape/ic-dots.png') }}" alt="Banner Shape">
                    </span>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="inner position-relative">
                            {{-- <h6 class="subtitle"><span class="theme-gradient">Professional & Trusted Result</span></h6> --}}
                            <h4 class=""><span class="theme-gradient">TREE HR (Human Resources) RESEARCH</span></h4>
                            {{-- <p class="description">Tree HR Riset Personality Test</p> --}}
                            <p class="">Tree HR Research adalah sebuah program riset dan pengembangan yang difokuskan pada inovasi dan penerapan model pengembangan sumber daya manusia (SDM) berbasis analogi pohon (Tree-HR Model). Program ini dipimpin oleh Dr. Amir Tengku Ramly dan telah didaftarkan serta memperoleh HAKI resmi dari Kementerian Hukum dan HAM Republik Indonesia sebagai karya intelektual orisinal di bidang pengembangan ilmu dan Inovasi (Seni) model Pengembangan Sumber Daya Manusia (SDM).</p>
                            <div class="button-group">
                                <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('course.open') }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Personality Test (Klik)</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div class="line-arrow scene">
                                <span data-depth="1">
                                    <img src="{{ asset('assets/images/shape/i-line-arrow.png') }}" alt="Banner Shape">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="banner-wrap">
                            <div class="banner" data-parallax='{"x": 0, "y": 60}'>
                                <img src="{{ asset('assets/images/custom/tree_hr.png') }}" alt="Banner">
                            </div>
                            {{-- <div class="feature">
                                <span>
                                    <img src="{{ asset('assets/images/shape/o-icon-1.png') }}" alt="">
                                </span>
                                <div>
                                    <h6 class="feature-title">Your</h6>
                                    <p class="feature-description">Admissoin Complete</p>
                                </div>
                            </div> --}}
                            {{-- <div class="enrolled">
                                <div class="enrolled-cont">
                                    <span>
                                        <img src="{{ asset('assets/images/shape/o-icon-2.png') }}" alt="">
                                    </span>
                                    <div>
                                        <h6 class="feature-title">36k+</h6>
                                        <p class="feature-description">Melakukan Tes</p>
                                    </div>
                                </div>
                                <div class="profile-share">
                                    <a href="#" class="avatar" data-tooltip="Ava Miller" tabindex="0">
                                        <img src="{{ asset('assets/images/category/personal.png') }}" alt="education">
                                    </a>
                                    <a href="#" class="avatar" data-tooltip="Mark Jordan" tabindex="0">
                                        <img src="{{ asset('assets/images/shape/art-stu-1.png') }}" alt="education">
                                    </a>
                                    <a href="#" class="avatar" data-tooltip="Jordan" tabindex="0">
                                        <img src="{{ asset('assets/images/shape/art-stu-3.png') }}" alt="education">
                                    </a>
                                    <a href="#" class="avatar" data-tooltip="Ava Miller" tabindex="0">
                                        <img src="{{ asset('assets/images/shape/i-team.png') }}" alt="education">
                                    </a>
                                </div>
                            </div>
                            <div class="feature item-2">
                                <span>
                                    <img src="{{ asset('assets/images/shape/o-icon-3.png') }}" alt="">
                                </span>
                                <div>
                                    <h6 class="feature-title">99%</h6>
                                    <p class="feature-description">Satisfied</p>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- Start Brand -->
                <div class="brand-box-wrap">
                    <div class="uion">
                        <img src="{{ asset('assets/images/shape/i-uion-big.png') }}" alt="Banner Shape">
                    </div>
                    <div class="leaf" data-parallax='{"x": 0, "y": -30}'>
                        <img src="{{ asset('assets/images/shape/i-leaf.png') }}" alt="Banner Shape">
                    </div>
                    <div class="brand-box text-center bg-white parent-gallery-container">
                        <span class="b1 w-600 mb-0">Mitra Penelitian</span>
                        <ul class="brand-list brand-style-2 justify-content-start justify-content-lg-between mt--30">
                            @foreach ($mitra as $item)
                                <li><a href="{{ Storage::url($item->logo) }}" class="child-gallery-single"><img src="{{ Storage::url($item->logo) }}" alt="Brand Image"></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Brand -->
            </div>
        </div>
    </div>
    <!-- End Banner Area  -->

    <!-- Start Testimonial Area -->
    <div class="rbt-testimonial-area bg-color-white rbt-section-gapBottom mt-5 pt-5">
    {{-- <div class="rbt-testimonial-area bg-color-white rbt-section-gapBottom"> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb--60">
                    <div class="section-title text-center">
                        <h6 class="b2 mb--15"><span class="theme-gradient">Testimoni</span></h6>
                        <h2 class="title"><span class="theme-gradient">Feedback</span> Pengguna</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-item-3-activation swiper rbt-arrow-between icon-bg-gray rbt-dot-bottom-center pb--50 gutter-swiper-30">
                <div class="swiper-wrapper">
                    @foreach ($testimonies as $item)
                        <!-- Start Single Testimonial  -->
                        <div class="swiper-slide">
                            <div class="single-slide">
                                <div class="rbt-testimonial-box">
                                    <div class="inner shadow-11">
                                        <div class="clint-info-wrapper">
                                            <div class="thumb">
                                                <img src="{{ Storage::url($item->image) }}" alt="Clint Images">
                                            </div>
                                            <div class="client-info">
                                                <h5 class="title">{{ $item->name }}</h5>
                                                <span>{{ $item->position }}</span>
                                            </div>
                                        </div>
                                        <div class="description">
                                            <p class="subtitle-3">{{ $item->message }}</p>
                                            <div class="rating mt--20">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Testimonial  -->
                    @endforeach
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-left">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-left"></i>
                        <i class="rbt-icon-top feather-arrow-left"></i>
                    </div>
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-right">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-right"></i>
                        <i class="rbt-icon-top feather-arrow-right"></i>
                    </div>
                </div>

                <div class="rbt-swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Area -->

    <!-- Start Categoy -->
    {{-- <div class="rbt-category-area rbt-section-gapBottom">
        <div class="container">
            <div class="section-title text-center mb--55">
                <h6 class="b2 mb--15"><span class="theme-gradient">Popular Subject</span></h6>
                <h2 class="title w-600">Explore Top Courses Caterories <br> That <span class="theme-gradient">Change Yourself</span></h2>
            </div>
            <div class="swiper category-activation-one rbt-arrow-between icon-bg-gray rbt-dot-bottom-center gutter-swiper-30 pb--50">
                <div class="swiper-wrapper">
                    <!-- Start Category Box Layout  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <a class="rbt-cat-box rbt-cat-box-1 text-center" href="http://127.0.0.1:8001/courses/course-filter-one-toggle">
                                <div class="inner">
                                    <div class="icons">
                                        <img src="{{ asset('assets/images/category/web-design.png') }}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Web Design</h5>
                                        <div class="read-more-btn">
                                            <span class="rbt-btn-link">25 Courses<i class="feather-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <a class="rbt-cat-box rbt-cat-box-1 text-center" href="http://127.0.0.1:8001/courses/course-filter-one-toggle">
                                <div class="inner">
                                    <div class="icons">
                                        <img src="{{ asset('assets/images/category/design.png') }}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Graphic Design</h5>
                                        <div class="read-more-btn">
                                            <span class="rbt-btn-link">30 Courses <i class="feather-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <a class="rbt-cat-box rbt-cat-box-1 text-center" href="http://127.0.0.1:8001/courses/course-filter-one-toggle">
                                <div class="inner">
                                    <div class="icons">
                                        <img src="{{ asset('assets/images/category/personal.png') }}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Personal Development</h5>
                                        <div class="read-more-btn">
                                            <span class="rbt-btn-link">20 Courses<i class="feather-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <a class="rbt-cat-box rbt-cat-box-1 text-center" href="http://127.0.0.1:8001/courses/course-filter-one-toggle">
                                <div class="inner">
                                    <div class="icons">
                                        <img src="{{ asset('assets/images/category/server.png') }}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">IT and Software</h5>
                                        <div class="read-more-btn">
                                            <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="swiper-slide">
                        <div class="single-slide">
                            <a class="rbt-cat-box rbt-cat-box-1 text-center" href="http://127.0.0.1:8001/courses/course-filter-one-toggle">
                                <div class="inner">
                                    <div class="icons">
                                        <img src="{{ asset('assets/images/category/pantone.png') }}" alt="Icons Images">
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Sales Marketing</h5>
                                        <div class="read-more-btn">
                                            <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- End Category Box Layout  -->
                </div>


                <div class="rbt-swiper-arrow rbt-arrow-left">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-left"></i>
                        <i class="rbt-icon-top feather-arrow-left"></i>
                    </div>
                </div>

                <div class="rbt-swiper-arrow rbt-arrow-right">
                    <div class="custom-overfolow">
                        <i class="rbt-icon feather-arrow-right"></i>
                        <i class="rbt-icon-top feather-arrow-right"></i>
                    </div>
                </div>

                <div class="rbt-swiper-pagination"></div>
            </div>
        </div>
    </div> --}}
    <!-- End Categoy -->

    <!-- Start Video Area  -->
    {{-- <div class="rbt-video-area video-section-03 bg-color-white rbt-section-gap" id="why_us_section">
        <div class="container">
            <div class="row g-5 align-items-center position-relative">
                <div class="union-shape">
                    <img src="{{ asset('assets/images/shape/v-union.png') }}" alt="Union Shape">
                </div>
                <div class="star-shape">
                    <img src="{{ asset('assets/images/shape/v-star.png') }}" alt="Shape">
                </div>
                <div class="col-lg-6">
                    <div class="video-popup-wrapper">
                        <img class="w-100 rbt-radius" src="{{ asset('assets/images/custom/design_thinking.png') }}" alt="Video Images">
                        <a class="rbt-btn rounded-player popup-video position-to-top rbtplayer border-rounded" href="https://www.youtube.com/watch?v=s1VAh51C9Bo">
                            <span><i class="feather-play"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner pl--50 pl_lg--0 pl_md--0 pl_sm--0">
                        <div class="section-title text-start">
                            <h6 class="b2 mb--15"><span class="theme-gradient">Mengapa Memilih Kami</span></h6>
                            <h2 class="title w-600">Tes Kami Berfokus <br> Membangun Keterampilan Dasar yang Kuat untuk <span class="theme-gradient">Pertumbuhan Karir</span></h2>
                            <div class="rbt-feature-wrapper mt--40">
                                <div class="rbt-feature feature-style-1 align-items-center">
                                    <div class="icon bg-pink-opacity">
                                        <i class="feather-heart"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">Waktu Tes Flexible</h6>
                                    </div>
                                </div>

                                <div class="rbt-feature feature-style-1 align-items-center">
                                    <div class="icon bg-primary-opacity">
                                        <i class="feather-book"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">Tes Darimana Saja</h6>
                                    </div>
                                </div>

                                <div class="rbt-feature feature-style-1 align-items-center">
                                    <div class="icon bg-coral-opacity">
                                        <i class="feather-monitor"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">Hasil Ditampilkan Secara Realtime</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Video Area  -->

    <!-- Start Newsletter Area -->
    {{-- <div class="rbt-newsletter-area newsletter-style-2 bg-gradient-7 rbt-section-gap">
        <div class="container">
            <div class="row row--15 align-items-center">
                <div class="col-lg-12">
                    <div class="inner text-center">
                        <div class="section-title text-center">
                            <h6 class="b2 mb--15 color-white">Dapatkan Pembaruan Terbaru</h6>
                            <h2 class="title color-white w-600"><strong>Langganan</strong> Buletin Kami</h2>
                        </div>
                        <form action="#" class="newsletter-form-1 mt--40">
                            <input type="email" placeholder="Tulis Email Kamu">
                            <button type="button" class="rbt-btn btn-md btn-gradient hover-icon-reverse" data-bs-toggle="modal" data-bs-target="#subscribeModal">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Langganan</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </button>
                        </form>
                        <span class="note-text color-white mt--20">Tanpa iklan, Tanpa jejak, Tanpa komitmen</span>

                        <div class="row row--15 mt--50">
                            <!-- Start Single Counter -->
                            <div class="col-lg-3 offset-lg-3 col-md-6 col-sm-6 single-counter">
                                <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                    <div class="inner">
                                        <div class="content">
                                            <h3 class="counter color-white w-600"><span class="odometer rbt-font-primary" data-count="500">00</span>
                                            </h3>
                                            <h5 class="title color-white">Merasa Sangat Terbantu</h5>
                                            <span class="subtitle color-white">Oleh Tes &amp; Bimbingan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Counter -->

                            <!-- Start Single Counter -->
                            <div class="col-lg-3 col-md-6 col-sm-6 single-counter mt_mobile--30">
                                <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                    <div class="inner">
                                        <div class="content">
                                            <h3 class="counter color-white w-600"><span class="odometer rbt-font-primary" data-count="100">00</span>
                                            </h3>
                                            <h5 class="title color-white">Orang Menjadi Lebih Baik</h5>
                                            <span class="subtitle color-white">Mengetahui Langkah &amp; Keputusan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Counter -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Newsletter Area -->

    {{-- <!-- Modal -->
    <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Terima kasih telah berlangganan buletin kami! Kami akan mengirimkan pembaruan terbaru dan informasi menarik ke email Anda. Pastikan untuk memeriksa kotak masuk Anda secara teratur untuk tidak ketinggalan berita terbaru dari kami.'
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div> --}}

    @include('components.footer')
</div>
