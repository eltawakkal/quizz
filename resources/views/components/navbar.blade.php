<!-- Start Header Area -->
<header class="rbt-header rbt-header-default">
    <div class="rbt-sticky-placeholder"></div>

    @if (isset($remove_sticky))
        <div class="rbt-header-top rbt-header-top-1 header-space-betwween top-expended-activation">
    @else
        <div class="rbt-header-wrapper bg-color-white header-sticky">
    @endif
        <div class="container">
            <div class="mainbar-row rbt-navigation-center align-items-center">
                <div class="header-left">
                    <div class="logo logo-dark">
                        <a href="#">
                            <img src="{{ asset('assets/images/custom/logo_pendidikan.png') }}" alt="Education Logo Images">
                        </a>
                    </div>

                    <div class="logo d-none logo-light">
                        <a href="#">
                            <img src="{{ asset('assets/images/custom/logo_pendidikan.png') }}"
                                alt="Education Logo Images">
                        </a>
                    </div>
                </div>
                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav onepagenav">
                        <ul class="mainmenu">
                            <li class="position-static {{ request()->is('/') ? 'current' : '' }}">
                                <a href="{{ request()->is('/') ? '#home_section' : '/' }}">Home</a>
                            </li>
                            <li class="position-static">
                                <a href="/#psikotes_section">Psikotes</a>
                            </li>
                            <li class="position-static">
                                <a href="/#why_us_section">Kenapa Kami</a>
                            </li>
                            <li class="position-static">
                                <a href="/#testimony_section">Testimoni</a>
                            </li>
                            <li class="position-static">
                                <a href="/#blog_section">Blog</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="header-right">
                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn rbt-switch-btn btn-gradient btn-sm hover-transform-none"
                            href="{{ route('course.detail', 'testing') }}">
                            <span data-text="Tes Sekarang">Tes Sekarang</span>
                        </a>
                    </div>

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->
                </div>

            </div>
        </div>
    </div>

</header>

<!-- Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <div class="logo logo-dark">
                        <a href="#">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                        </a>
                    </div>

                    <div class="logo d-none logo-light">
                        <a href="#">
                            <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}"
                                alt="Education Logo Images">
                        </a>
                    </div>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <p class="description">Histudy is a education website template. You can customize all.</p>
            <ul class="navbar-top-left rbt-information-list justify-content-start">
                <li>
                    <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                </li>
                <li>
                    <a href="#"><i class="feather-phone"></i>(302) 555-0107</a>
                </li>
            </ul>
        </div>

        <nav class="mainmenu-nav onepagenav">
            <ul class="mainmenu">
                <ul class="mainmenu close-button">
                    <li class="position-static current">
                        <a href="#home_section">Home</a>
                    </li>
                    <li class="position-static">
                        <a href="#psikotes_section">Psikotes</a>
                    </li>
                    <li class="position-static">
                        <a href="#why_us_section">Kenapa Kami</a>
                    </li>
                    <li class="position-static">
                        <a href="#testimony_section">Testimoni</a>
                    </li>
                    <li class="position-static">
                        <a href="#blog_section">Blog</a>
                    </li>
                </ul>
            </ul>
        </nav>

        <div class="mobile-menu-bottom">
            <div class="rbt-btn-wrapper mb--20">
                <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                    href="{{ route('course.detail', 'testing') }}">
                    <span>Tes Sekarang</span>
                </a>
            </div>

            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">Find With Us</span>
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li><a href="https://www.facebook.com/">
                            <i class="feather-facebook"></i>
                        </a>
                    </li>
                    <li><a href="https://www.twitter.com">
                            <i class="feather-twitter"></i>
                        </a>
                    </li>
                    <li><a href="https://www.instagram.com/">
                            <i class="feather-instagram"></i>
                        </a>
                    </li>
                    <li><a href="https://www.linkdin.com/">
                            <i class="feather-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>