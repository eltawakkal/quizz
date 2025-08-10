<div>
    <div wire:ignore>
        @include('components.navbar')
    </div>
    
    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">
            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area  -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="/">Beranda</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Luaran Penelitian</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">Luaran Penelitian</h1>
                                {{-- <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> 50 Courses
                                </a> --}}
                            </div>

                            {{-- <p class="description">Courses that help beginner designers become true unicorns. </p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
        </div>
    </div>

    <!-- Start Card Style -->
    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row row--30 gy-5">
                <div class="col-lg-3 order-2 order-lg-1">
                    <aside class="rbt-sidebar-widget-wrapper">

                        <!-- Start Widget Area  -->
                        <div class="rbt-single-widget rbt-widget-search">
                            <div class="inner">
                                <form wire:submit.prevent="doSearch" class="rbt-search-style-1">
                                    <input wire:ignore wire:model.live="query" type="text" placeholder="Cari nama file..">
                                    <button class="search-btn"><i class="feather-search"></i></button>
                                </form>
                                <div class="rbt-single-widget rbt-widget-categories">
                                    <div class="inner">
                                        <h4 class="rbt-widget-title">Tahun</h4>
                                        <ul class="rbt-sidebar-list-wrapper categories-list-check">
                                            <div wire:ignore class="rbt-modern-select bg-transparent height-45 mb--10">
                                                <select wire:model.live="category" class="w-100" id="field-4">
                                                    <option value="">Semua</option>
                                                    @foreach ($categories as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Area  -->
                    </aside>
                </div>
                <div class="col-lg-9 order-2 order-lg-2">
                    <div class="rbt-dashboard-table table-responsive mobile-table-750 rbt-card">
                        <div class="table-responsive">
                            <table class="rbt-table table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Tahun</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody wire:loading>
                                    <tr class="text-center">
                                        <td class="text-center p-5" colspan="2">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody wire:loading.remove>
                                    @foreach ($files as $file)
                                        <tr>
                                            <th>
                                                <span class="h6 mb--5">{{ $file->file_name }}</span>
                                            </th>
                                            <td>
                                                <p class="b3">{{ $file->category }}</p>
                                            </td>
                                            {{-- <td>
                                                <span
                                                    class="rbt-badge-5 bg-color-success-opacity color-success">Pass</span>
                                            </td> --}}
                                            <td style="width: 13em">
                                                <div class="rbt-button-group text-center">
                                                    <a class="rbt-btn btn-xs bg-primary-opacity radius-round" target="_blank" href="{{ $file->file_url ?? Storage::url($file->file_path) }}" title="Edit">
                                                        @if (isset($file->file_url))
                                                            Kunjungi Situs <i class="feather-globe pl--0"></i>
                                                        @else
                                                            Unduh File <i class="feather-download-cloud pl--0"></i>
                                                        @endif
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{-- <div class="rbt-course-grid-column">
                        <!-- Start Single Card  -->
                        @foreach ($files as $file)
                            @if (isset($file->file_url))
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a>
                                                @if ($extension == 'pdf')
                                                    <img src="{{ asset('assets/images/custom/icon/pdf.png') }}" alt="Card image">
                                                @elseif ($extension == 'doc' || $extension == 'docx')
                                                    <img src="{{ asset('assets/images/custom/icon/doc.png') }}" alt="Card image">
                                                @elseif ($extension == 'ppt' || $extension == 'pptx')
                                                    <img src="{{ asset('assets/images/custom/icon/ppt.png') }}" alt="Card image">
                                                @elseif ($extension == 'xls' || $extension == 'xlsx')
                                                    <img src="{{ asset('assets/images/custom/icon/xls.png') }}" alt="Card image">
                                                @else
                                                    <img src="{{ asset('assets/images/custom/icon/php.png') }}" alt="Card image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h5 class=""><a>{{ $file->file_name }}</a>
                                            </h5>
                                            <p class="rbt-card-text">
                                                
                                            </p>
                                            <div class="rbt-card-bottom">
                                                <a class="rbt-btn-link" target="_blank" href="{{ $file->file_url }}">Buka Situs<i class="feather-globe"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @php
                                    $filePath = storage_path($file->file_path);
                                    $extension = File::extension($filePath);
                                    // Using pathinfo() (pure PHP)
                                    $info = pathinfo($filePath);
                                    $extension = $info['extension'];
                                @endphp
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a>
                                                @if ($extension == 'pdf')
                                                    <img src="{{ asset('assets/images/custom/icon/pdf.png') }}" alt="Card image">
                                                @elseif ($extension == 'doc' || $extension == 'docx')
                                                    <img src="{{ asset('assets/images/custom/icon/doc.png') }}" alt="Card image">
                                                @elseif ($extension == 'ppt' || $extension == 'pptx')
                                                    <img src="{{ asset('assets/images/custom/icon/ppt.png') }}" alt="Card image">
                                                @elseif ($extension == 'xls' || $extension == 'xlsx')
                                                    <img src="{{ asset('assets/images/custom/icon/xls.png') }}" alt="Card image">
                                                @else
                                                    <img src="{{ asset('assets/images/custom/icon/php.png') }}" alt="Card image">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h5 class=""><a>{{ $file->file_name }}</a>
                                            </h5>
                                            <p class="rbt-card-text">
                                                
                                            </p>
                                            <div class="rbt-card-bottom">
                                                <a class="rbt-btn-link" target="_blank" href="{{ Storage::url($file->file_path) }}">Unduh<i class="feather-arrow-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!-- End Single Card  -->

                    </div> --}}

                    {{-- <div class="row">
                        <div class="col-lg-12 mt--60">
                            <nav>
                                <ul class="rbt-pagination">
                                    <li><a href="#" aria-label="Previous"><i class="feather-chevron-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li class="active"><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#" aria-label="Next"><i class="feather-chevron-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <!-- End Card Style -->

    @include('components.footer')
</div>
