<div>
    @include('components.navbar')
    <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
        <div class="breadcrumb-inner breadcrumb-dark">
            <img src="http://127.0.0.1:8001/assets/images/bg/bg-image-10.jpg" alt="Education Images">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content text-start">
                        <h2 class="title">Tree HR Personality Test</h2>
                        <p class="description">Sekarang Anda berhak memilih waktu terbaikmu untuk melakukan tes. Dimanapun & Kapanpun.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-course-details-area ptb--10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-details-content">
                        <!-- Start Course Feature Box  -->
                        <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30" id="overview">
                            <div class="rbt-course-feature-inner has-show-more-inner-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3">Penjelasan</h4>
                                </div>
                                <div>
                                    {!! $quiz->description !!}
                                </div>
                            </div>
                        </div>
                        <!-- End Course Feature Box  -->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="rbt-shadow-box course-sidebar-top rbt-gradient-border" style="position: sticky; top: 100px">
                        <div class="inner">

                            <!-- Start Viedo Wrapper  -->
                            <a class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--15" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                                <a href="{{ route('course.open', Crypt::encryptString($quiz->id)) }}">
                                    <img src="{{ Storage::url($quiz->image) }}" alt="Card image">
                                </a>
                            </a>
                            <!-- End Viedo Wrapper  -->

                            <div class="content-item-content">

                                <div class="add-to-card-button mt--15">
                                    <a class="rbt-btn btn-gradient icon-hover w-100 d-block text-center" href="{{ route('course.open', Crypt::encryptString($quiz->id)) }}">
                                        <span class="btn-text">Personality Test (Klik)</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>