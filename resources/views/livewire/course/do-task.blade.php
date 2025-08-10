<div>
    <div class="vh-100 d-flex flex-column">
        <div class="lesson-top-bar sticky-top top-0">
            <div class="lesson-top-left">
                <h5>{{ $quiz->title }}</h5>
            </div>
            <div class="lesson-top-right">
                <div class="rbt-btn-close">
                    <a title="Go Back to Course" class="rbt-round-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="feather-x"></i></a>
                </div>
            </div>
        </div>
        <div class="flex-grow-1 d-flex justify-content-center align-items-center">
            <div class="row justify-content-center">
                @if (@env('APP_DEBUG'))
                    <div class="rbt-card col-6 mb-5">
                        <div class="row">
                            <h5 class="col-12 text-center">total question: <span class="text-warning">{{ json_encode($answerss, JSON_PRETTY_PRINT) }}</span></h5>
                            <h5 class="col-12 text-center">quest index: <span class="text-warning">{{ $questionIndex }}</span></h5>
                            <h5 class="col-12 text-center">total question: <span class="text-warning">{{ count($questions) }}</span></h5>
                            <div class="col-12 rbt-badge-6 pt-5">
                                <h5 class="col-12 text-center text-white">Session 1 Result: <span class="text-warning">{{ $type }}</span></h5>
                                <h5 class="col-12 text-center text-white">Session 2 Result: <span class="text-warning">{{ $sessionTwoResult }}</span></h5>
                                <h5 class="col-12 text-center text-white">Session 3 Result: <span class="text-warning">{{ $sessionThreeResult }}</span></h5>
                                <h5 class="col-12 text-center text-white">Session 4 Result: <span class="text-warning">{{ $sessionFourResult }}</span></h5>
                                <h5 class="col-12 text-center text-white">Session 5 Result: <span class="text-warning">{{ $sessionFiveResult }}</span></h5>
                                <h5 class="col-12 text-center text-white">Session 6 Result: <span class="text-warning">{{ $sessionSixResult }}</span></h5>
                            </div>
                            <h5 class="col-2 text-center">A: <span class="text-warning">{{ $answers['A'] }}</span></h5>
                            <h5 class="col-2 text-center">B: <span class="text-warning">{{ $answers['B'] }}</span></h5>
                            <h5 class="col-2 text-center">C: <span class="text-warning">{{ $answers['C'] }}</span></h5>
                            <h5 class="col-2 text-center">D: <span class="text-warning">{{ $answers['D'] }}</span></h5>
                            <h5 class="col-2 text-center">E: <span class="text-warning">{{ $answers['E'] }}</span></h5>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        {{-- <span class="subtitle bg-primary-opacity">Pertanyaan Sesi {{ $questions[$questionIndex]['session'] . (env('APP_DEBUG') ? ' - ' . $questions[$questionIndex]['type'] : '') }}</span> --}}
                        <h4 class="title">{{ $questions[$questionIndex]['question'] }}</h4>
                    </div>
                </div>
                <div class="row mt--50 mb--50">
                    <div class="col-lg-12" style="margin-bottom: 10 0px">
                        <div class="rbt-button-group" onclick="this.blur()">
                            @foreach ($questions[$questionIndex]['options'] as $key => $option)
                                @if ($option != null)
                                
                                    <div wire:click.prevent="submitQuestion('{{ $key }}')" class="rbt-card custom-hover-bg mx-3 mb-3">
                                        <p>{{ $key }}. {{ $option }}</p>
                                    </div>
                                    {{-- <a class="rbt-btn btn-border h-100" style="
                                        line-height: 1.5; 
                                        padding: 20px;
                                        focus {
                                            outline: none;
                                            box-shadow: none;
                                        }
                                        ";
                                    wire:click.prevent="nextQuestion('{{ $key }}')" href="#">{{ $key }}. {{ $option }}</a> --}}
                                @endif
                                
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 text-center mt-5 mb-5">
                        <a wire:click="prevQuestion" class="rbt-btn-link mx-3 {{ $questionIndex == 0 ? 'disabled' : '' }}" href="#">
                            <i class="feather-arrow-left"></i>Sebelumnya
                        </a>
                        <a wire:click="nextQuestion" class="rbt-btn-link mx-5 {{ $questionIndex < count($answerss) ? '' : 'disabled' }}" href="#">
                            Selanjutnya<i class="feather-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>