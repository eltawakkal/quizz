 <!-- Start Footer aera -->
<footer class="rbt-footer footer-style-1">
    <div class="footer-top">
        <div class="container">
            <div class="row row--15 mt_dec--30">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <div class="logo logo-dark">
                            <a href="#">
                                <img src="{{ asset('assets/images/custom/tree_hr_logo.png') }}" alt="Edu-cause">
                            </a>
                        </div>
                        <div class="logo d-none logo-light">
                            <a href="#">
                                <img src="{{ asset('assets/images/custom/tree_hr_logo.png') }}"
                                    alt="Edu-cause">
                            </a>
                        </div>

                        <p class="description mt--20">
                        </p>

                        {{-- <div class="contact-btn mt--30">
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Bergabung Dengan Kami</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div> --}}
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Useful Links</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <a href="/#testimony_section">Testimoni</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Tentang Kami</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('course.detail') }}">Penelitian Kami</a>
                            </li>
                            <li>
                                <a href="{{ route('landing-page.contact-us') }}">Kerja Sama</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Kontak</h5>
                        <ul class="ft-link">
                            <li><span>No. HP / WA:</span> <a href="#">081316005530</a></li>
                            </li>
                            <li><span>Lokasi:</span> Bogor, Indonesia</li>
                        </ul>
                        {{-- <ul class="social-icon social-default justify-content-start mt--20">
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
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © 2025 <a
                            href="https://www.pixcelsthemes.com/">{{ env('APP_NAME') }}.</a> All Rights Reserved</p>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <ul
                        class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                        <li><a href="">Langganan</a></li>
                        <li><a href="/admin">Login & Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>
<!-- End Footer aera -->