<div>
    <div class="vh-100 d-flex flex-column">
        <div class="lesson-top-bar sticky-top top-0">
            <div class="lesson-top-left">
                <h5>The Complete Histudy 2024: From Zero to Expert!</h5>
            </div>
            <div class="lesson-top-right">
                <div class="rbt-btn-close">
                    <a href="{{ redirect()->back() }}" title="Go Back to Course" class="rbt-round-btn"><i class="feather-x"></i></a>
                </div>
            </div>
        </div>
        <div class="flex-grow-1 d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle bg-primary-opacity">Pertanyaan Sesi 1</span>
                        <h4 class="title">{{ $questions[$questionIndex]['text'] }}</h4>
                    </div>
                </div>
                <div class="row mt--50">
                    <div class="col-lg-12">
                        <div class="rbt-button-group">
                            @foreach ($questions[$questionIndex]['options'] as $key => $option)
                                <a class="rbt-btn btn-border" wire:click.prevent="nextQuestion" href="#">{{ $key }}. {{ $option }}</a>
                                
                            @endforeach
                            {{-- <a class="rbt-btn btn-border" wire:click.prevent="nextQuestion" href="">Menggunakan slide berisi poin dan diagram</a>
                            <a class="rbt-btn btn-border" wire:click.prevent="nextQuestion" href="#">Menjelaskan secara lisan dengan narasi atau cerita</a>
                            <a class="rbt-btn btn-border" wire:click.prevent="nextQuestion" href="#">Mengajak mahasiswa/siswa praktik atau simulasi asdf adsf sdaf adfs df daf adff da fdadf af dafds </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>