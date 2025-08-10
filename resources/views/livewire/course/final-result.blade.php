<div>
    @include('components.navbar')
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">
            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top rbt-breadcrumb-style-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="content text-center">
                                <h2 class="title theme-gradient">Berikut Hasil Tes Anda</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="inner">
            <div class="container bg-white rbt-card">
                <div class="col-lg-12">
                    <!-- Start Viedo Wrapper  -->
                    <a class="video-popup-with-text text-center popup-video mb--15" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                        <div class="video-content">
                            {{-- <div style="width: 100%; height: 1280px; overflow: hidden; position: relative;">
                                <iframe src="{{ 'http://127.0.0.1:8000/personality-test/result/eyJpdiI6ImkwdTNTZzhDWkN3NVNnYkJlU1hwM1E9PSIsInZhbHVlIjoiQWJZR2wreFBmb0pRTksvOEppQ2Rtdz09IiwibWFjIjoiNGRiMWEyY2ZmY2U4N2JlZTQ4MzIyMGVlM2Y0ZWJhNjEzMDQwYWU0ZWE5ZDdkMzE4NDY2Mjk3MmI2YjcyNzJiNSIsInRhZyI6IiJ9' }}" 
                                        style="width: 100%; height: 100%; border: none; 
                                                transform: scale(0.8); 
                                                transform-origin: top left; 
                                                position: absolute; top: 0; left: 0;">
                                </iframe>
                            </div> --}}
                            <div id="iframe-wrapper">
                                <div id="iframe-scaler">
                                    <iframe src="{{ route('course.result', Crypt::encryptString($resultId)) }}" frameborder="0"></iframe>
                                </div>
                            </div>
                            {{-- <iframe class="mb-5" src="{{ 'http://127.0.0.1:8000/personality-test/result/eyJpdiI6ImkwdTNTZzhDWkN3NVNnYkJlU1hwM1E9PSIsInZhbHVlIjoiQWJZR2wreFBmb0pRTksvOEppQ2Rtdz09IiwibWFjIjoiNGRiMWEyY2ZmY2U4N2JlZTQ4MzIyMGVlM2Y0ZWJhNjEzMDQwYWU0ZWE5ZDdkMzE4NDY2Mjk3MmI2YjcyNzJiNSIsInRhZyI6IiJ9' }}" frameborder="0"></iframe> --}}
                            {{-- <img class="w-100 rbt-radius" src="http://127.0.0.1:8001/assets/images/others/video-07.jpg" alt="Video Images"> --}}
                            {{-- <div class="position-to-top">
                                <span class="rbt-btn rounded-player-2 with-animation">
                                        <span class="play-icon"></span>
                                </span>
                            </div> --}}
                            {{-- <span class="play-view-text d-block color-white"><i class="feather-eye"></i> Preview this course</span> --}}
                        </div>
                    </a>
                    <!-- End Viedo Wrapper  -->
                </div>
            </div>
        </div>
    </div>

    <script>
    function scaleIframe() {
        const scaler = document.getElementById("iframe-scaler");
        const container = document.getElementById("iframe-wrapper");
        const iframe = scaler.querySelector("iframe");

        const originalWidth = 1200; // Original width of embedded page
        const containerWidth = container.offsetWidth;
        const scale = containerWidth / originalWidth;

        scaler.style.transform = `scale(${scale})`;
        scaler.style.width = `${originalWidth}px`;
        scaler.style.height = `${1650}px`;
    }

    window.addEventListener("load", scaleIframe);
    window.addEventListener("resize", scaleIframe);
    </script>
</div>
