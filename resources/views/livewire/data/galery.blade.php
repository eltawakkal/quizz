<div>
    @include('components.navbar')

    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">Gallery</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="/">Beranda</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-right"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-gallery-area">
        <div class="row g-0 parent-gallery-container justify-content-center">
            @foreach ($galeries as $item)
                <div class="rbt-card col-lg-2 col-md-4 col-sm-6 col-6 my-2 mx-2">
                    <a href="{{ Storage::url($item->file_path) }}" class="child-gallery-single">
                        <div class="rbt-gallery">
                            <img class="w-100" src="{{ Storage::url($item->file_path) }}" alt="Gallery Images">
                            <p>{{ $item->file_name }}</p>
                        </div>
                    </a>    
                </div>
            @endforeach
        </div>
    </div>

    @include('components.footer')
</div>
