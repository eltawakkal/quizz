<?php

namespace App\Livewire\Course;

use App\Models\Data\Quiz;
use App\Models\Data\QuizItem;
use App\Models\Data\TestResult;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DoTask extends Component
{

    public $quizId = "";
    public $questionIndex = 0;
    public $questions = [];
    public $answers = [
        'A' => 0,
        'B' => 0,
        'C' => 0,
        'D' => 0,
        'E' => 0,
    ];
    public $answerss = [];

    // result params
    public $type = "";
    public $sessionTwoResult = "";
    public $sessionThreeResult = "";
    public $sessionFourResult = "";
    public $sessionFiveResult = "";
    public $sessionSixResult = "";

    public $isLogged = false;

    public function mount()
    {

        $this->isLogged = Auth::check();
        
        if (!$this->isLogged) {
            Session::put('currUrl', Request::fullUrl());
            return redirect(route('auth.login'));
        }

        $quiz = Quiz::get()->first();
        // $this->quizId = Crypt::decryptString($course_id);
        $this->quizId = $this->quizId = $quiz->id;

        $this->questions = QuizItem::where('session', 1)->where('type', 'umum')->get()->map(function ($item) {
            return [
                'session' => $item->session,
                'type' => $item->type,
                'question' => $item->question,
                'options' => [
                    'A' => $item->a_answer,
                    'B' => $item->b_answer,
                    'C' => $item->c_answer,
                    'D' => $item->d_answer,
                    'E' => $item->e_answer,
                ],
            ];
        })->toArray();
    }

    public function render()
    {
        $quiz = \App\Models\Data\Quiz::with('items', 'category')
            ->findOrFail($this->quizId);

        return view('livewire.course.do-task', [
            'remove_sticky' => true,
            'quiz' => $quiz,
        ]);
    }

    public function submitQuestion($key)
    {
        if ($this->questionIndex < count($this->questions) - 1) {
            $this->answers[$key] = $this->answers[$key] + 1;

            $this->answerss[$this->questionIndex] = $key;

            $this->questionIndex++;
        } else {
            $this->answers[$key] = $this->answers[$key] + 1;

            $this->answerss[$this->questionIndex] = $key;

            if ($this->questions[0]['session'] == 1) {
                if ($this->answers['A'] == 7) {
                    $this->type = 'ILC=ELC';
                } else if ($this->answers['B'] > 11) {
                    $this->type = 'ILC';
                } elseif ($this->answers['A'] > 11) {
                    $this->type = 'ELC';
                } elseif ($this->answers['B'] > 7) {
                    $this->type = 'ILC+ELC';
                } elseif ($this->answers['A'] > 7) {
                    $this->type = 'ELC+ILC';
                }

                $this->loadQuestion(['type' => $this->type]);
            } else if ($this->questions[0]['session'] == 2) {
                // $a = $this->answers['A'];
                // $b = $this->answers['B'];
                // $c = $this->answers['C'];
                // $d = $this->answers['D'];
                // $e = $this->answers['E'];

                $counts = array_count_values($this->answerss);
                $a = $counts['A'] ?? 0;
                $b = $counts['B'] ?? 0;
                $c = $counts['C'] ?? 0;
                $d = $counts['D'] ?? 0;
                $e = $counts['E'] ?? 0;

                if ($this->type == 'ILC') {
                    if ($a > $b) {
                        $this->sessionTwoResult = 'Pd'; //PHLEGMATIS damai (Pd)
                    } elseif ($a < $b) {
                        $this->sessionTwoResult = 'Ms'; //MELANKOLIS sempurna (Ms)
                    }
                } else if ($this->type == 'ELC') {
                    if ($a > $b) {
                        $this->sessionTwoResult = 'Sp'; //SANGUINIS popular (Sp)
                    } elseif ($a < $b) {
                        $this->sessionTwoResult = 'Kk'; //KOLERIS kuat (Kk)
                    }   
                } else if ($this->type == 'ILC+ELC') {
                    if ($c > $a && $c > $b) {
                        $this->sessionTwoResult = 'Pp'; //PHLEGMATIS popular (Pp)
                    } elseif ($b > $a && $b > $c) {
                        $this->sessionTwoResult = 'Pk'; //PHLEGMATIS kuat (Pk)
                    } elseif ($a > $b && $a > $c) {
                        $this->sessionTwoResult = 'Ps'; //PHLEGMATIS sempurna (Ps)
                    } elseif ($a > $b && $a > $c) {
                        $this->sessionTwoResult = 'Mp'; //MELANKOLIS popular (Mp)
                    } elseif ($c > $a && $c > $b) {
                        $this->sessionTwoResult = 'Md'; //MELANKOLIS damai (Md)
                    }
                } else if ($this->type == 'ELC+ILC') {
                    if ($c > $a && $c > $b) {
                        $this->sessionTwoResult = 'Sk'; //SANGUINIS Kuat (Sk)
                    } elseif ($b > $a && $b > $c) {
                        $this->sessionTwoResult = 'Ss'; //SANGUINIS Sempurna (Ss)
                    } elseif ($a > $b && $a > $c) {
                        $this->sessionTwoResult = 'Sd'; //SANGUINIS Damai (Sd)
                    } elseif ($a > $b && $a > $c) {
                        $this->sessionTwoResult = 'Kp'; //KOLERIS Populer (Kp)
                    } elseif ($b > $a && $b > $c) {
                        $this->sessionTwoResult = 'Ks'; //KOLERIS Sempurna (Ks)
                    } elseif ($c > $a && $c > $b) {
                        $this->sessionTwoResult = 'Kd'; //KOLERIS Damai (Kd)
                    }
                } else if ($this->type == 'ILC=ELC') {
                    if ($a > $b && $a > $c && $a > $d && $a > $e) {
                        $this->sessionTwoResult = 'Sm'; //SANGUINIS Master (Sm)
                    } elseif ($b > $a && $b > $c && $b > $d && $b > $e) {
                        $this->sessionTwoResult = 'Km'; //KOLERIS Master (Km)
                    } elseif ($c > $a && $c > $b && $c > $d && $c > $e) {
                        $this->sessionTwoResult = 'Pm'; //PHLEMATIS Master (Pm)
                    } elseif ($d > $a && $d > $b && $d > $c && $d > $e) {
                        $this->sessionTwoResult = 'Mm'; //MELANKOLIS Master (Mm)
                    } elseif ($e > $a && $e > $b && $e > $c && $e > $d) {
                        $this->sessionTwoResult = 'Malt'; //MASTER Altruis (Malt)
                    }
                }

                $this->loadQuestion(['session' => 3]);
            } else if ($this->questions[0]['session'] == 3) {
                // $a = $this->answers['A'];
                // $b = $this->answers['B'];
                // $c = $this->answers['C'];
                // $d = $this->answers['D'];
                // $e = $this->answers['E'];

                $a = $counts['A'] ?? 0;
                $b = $counts['B'] ?? 0;
                $c = $counts['C'] ?? 0;
                $d = $counts['D'] ?? 0;
                $e = $counts['E'] ?? 0;

                if ($a > $b) {
                    $this->sessionThreeResult = 'S';
                } else {
                    $this->sessionThreeResult = 'N';
                }

                $this->loadQuestion(['type' => $this->sessionThreeResult]);
            } else if ($this->questions[0]['session'] == 4) {
                // $a = $this->answers['A'];
                // $b = $this->answers['B'];
                // $c = $this->answers['C'];

                $a = $counts['A'] ?? 0;
                $b = $counts['B'] ?? 0;
                $c = $counts['C'] ?? 0;

                if ($a > $b) {
                    $this->sessionFourResult = $this->sessionThreeResult . 'T';
                } else {
                    $this->sessionFourResult = $this->sessionThreeResult . 'F';
                }

                $this->loadQuestion(['session' => 5]);
            } else if ($this->questions[0]['session'] == 5) {

                // $a = $this->answers['A'];
                // $b = $this->answers['B'];
                // $c = $this->answers['C'];

                $a = $counts['A'] ?? 0;
                $b = $counts['B'] ?? 0;
                $c = $counts['C'] ?? 0;

                if ($a > $b && $a > $c) {
                    $this->sessionFiveResult = 'Visual';
                } else if ($b > $a && $b > $c) {
                    $this->sessionFiveResult = 'Auditory';
                } else if ($c > $a && $c > $b) {
                    $this->sessionFiveResult = 'Kinestetik';
                }

                if ($this->type == 'ILC' || $this->type == 'ILC+ELC') {
                    $this->sessionSixResult = 'Internal';
                } else if ($this->type == 'ELC' || $this->type == 'ELC+ILC') {
                    $this->sessionSixResult = 'External';
                } else {
                    $this->sessionSixResult = 'Multisensory';
                }

                $user = Auth::user();
                $type = $this->sessionTwoResult . '-' . $this->sessionFourResult;
                if ($this->sessionSixResult == 'Multisensory') {
                    $teachingType = $this->sessionSixResult;
                } else {
                    $teachingType = $this->sessionFiveResult . ' ' . $this->sessionSixResult;
                }

                $teachingTypeDesc = '';
                $teachingTypeDimension = '';
                $inEx = $this->sessionSixResult;

                if ($this->sessionFiveResult == 'Visual') {
                    $inEx = $this->sessionSixResult;

                    if ($inEx == 'Internal') {
                        $teachingTypeDesc = '
                            <ul>
                                <li>Visual Internal</li>
                                <li>Membaca dengan kekuatan self motivation</li>
                                <li>Menulis dengan kekuatan self management</li>
                            </ul>
                        ';

                        $teachingTypeDimension = '
                            Gaya Mengajar Visual Internal Guru Visual Internal  cenderung:
                            <ul>
                                <li>Memiliki kekuatan imajinasi visual.</li>
                                <li>Mampu menciptakan “gambar kata” yang kuat dalam narasi pembelajaran.</li>
                                <li>Memotivasi siswa membayangkan konsep secara mendalam, bukan sekadar melihatnya di media visual.</li>
                            </ul>
                        ';
                    } else {
                        $teachingTypeDesc = '
                            <ul>
                                <li>Visual External</li>
                                <li>Membaca Dengan kekuatan eksternal motivation</li>
                                <li>Menulis dengan kekuatan contoh dan kesuksesan</li>
                            </ul>
                        ';

                        $teachingTypeDimension = '
                            Gaya Mengajar Visual Eksternal cenderung:
                            <ul>
                                <li>Membuat media yang menarik secara visual.</li>
                                <li>Menggunakan warna, bentuk, simbol, dan tampilan grafis untuk memperjelas konsep.</li>
                                <li>Mendorong siswa membuat catatan visual, mind mapping, dan presentasi bergambar.</li>
                            </ul>
                        ';
                    }
                } else if ($this->sessionFiveResult == 'Auditory') {
                    if ($inEx == 'Internal') {
                        $teachingTypeDesc = '
                            <ul>
                                <li>Auditori Internal</li>
                                <li>Mendengar Dengan kekuatan self motivation</li>
                                <li>Mengulang dengan kekuatan self management</li>
                            </ul>
                        ';

                        $teachingTypeDimension = '
                            Gaya Mengajar Auditory Internal sering:
                            <ul>
                                <li>Berbicara sambil berpikir.</li>
                                <li>Mengajak siswa memikirkan “suara dalam kepala” mereka untuk mengolah konsep.</li>
                                <li>Memotivasi siswa merefleksikan melalui kalimat tanya dalam batin.</li>
                            </ul>
                        ';
                    } else {
                        $teachingTypeDesc = '
                            <ul>
                                <li>Auditori External</li>
                                <li>Mendengar Dengan kekuatan eksternal motivation</li>
                                <li>Mengulang dengan kekuatan contoh dan kesuksesan</li>
                            </ul>
                        ';

                        $teachingTypeDimension = '
                            Gaya Mengajar Auditory Eksternal cenderung:
                            <ul>
                                <li>Ceria, ekspresif, gemar berbicara, dan menggunakan intonasi serta gaya bicara yang beragam.</li>
                                <li>Mendorong siswa untuk aktif secara verbal: tanya jawab, diskusi, presentasi lisan.</li>
                            </ul>
                        ';
                    }
                } else if ($this->sessionFiveResult == 'Kinestetik'){
                    if ($inEx == 'Internal') {
                        $teachingTypeDesc = '
                            <ul>
                                <li>Kinestetik Internal/External</li>
                                <li>Bercerita dengan kekuatan self motivation</li>
                                <li>Merasakan dengan kekuatan sell management</li>
                            </ul>
                        ';

                        $teachingTypeDimension = '
                            Gaya Mengajar Kinestetik Internal cenderung:
                            <ul>
                                <li>Memperhatikan bahasa tubuh, intuisi fisik, dan “gerakan batin” saat menjelaskan.</li>
                                <li>Mengajak siswa membayangkan proses secara fisik dalam pikiran mereka.</li>
                                <li>Memotivasi siswa untuk “merasakan dari dalam” konsep yang diajarkan, misalnya: “Coba rasakan bagaimana jika Anda ada di posisi itu…”</li>
                            <ul>
                        ';
                    } else {
                        $teachingTypeDesc = '
                            <ul>
                                <li>Kinestetik External</li>
                                <li>Bercerita  Dengan kekuatan eksternal motivation</li>
                                <li>Merasakan dengan kekuatan contoh dan kesuksesan</li>
                            </ul>
                        ';
                        $teachingTypeDimension = '
                            Gaya Mengajar kinestetik eksternal:
                            <ul>
                                <li>Aktif secara fisik dalam mengajar.</li>
                                <li>Lebih suka demonstrasi langsung, praktik lapangan, dan pembelajaran berbasis proyek.</li>
                                <li>Menggunakan ruang kelas secara dinamis, bukan hanya duduk di depan kelas.</li>
                            <ul>
                        ';
                    }
                } else {
                    $teachingTypeDesc = '
                        <ul>
                            <li>Mengaktifkan lebih dari satu indera (V,A,K) secara bersamaan</li>
                            <li>mengintegrasikan pembelajaran dengan sentuhan relasional dan teknis sekaligus.</li>
                        </ul>
                    ';

                    $teachingTypeDimension = '
                        Gaya Mengajar Multisensory cenderung:
                        <ul>
                            <li>Menyusun materi dengan berbagai media: teks bergambar, audio, dan aktivitas gerak.</li>
                            <li>Mengajar dengan strategi berbeda-beda: storytelling (auditory), role play (kinestetik), mind-mapping (visual).</li>
                            <li>Melibatkan siswa secara aktif melalui tanya jawab, simulasi, membuat proyek, atau bermain peran.</li>
                        </ul>
                    ';
                } 

                $testResult = TestResult::create([
                    'quiz_id' => $this->quizId,
                    'user_id' => $user->id,
                    'type' => $type,
                    'teaching_type' => $teachingType,
                    'teaching_type_desc' => $teachingTypeDesc,
                    'teaching_type_dimension' => $teachingTypeDimension
                ]);

                // $lastResult = TestResult::latest()->first();
                $id = $testResult->id;
                $zero = '00000';
                $len = strlen($id);
                $removedZero = substr($zero, 0, -$len);
                $date = Carbon::now()->format('d.m.Y');
                $fixNumber = '127.' . $date . '.' . $removedZero . $id;

                $testResult->update([
                    'no' => $fixNumber
                ]);
                
                return redirect(route('course.final-result', Crypt::encryptString($testResult->id)));
            }

            $this->questionIndex = 0;
            $this->answerss = [];
            $this->answers = [
                'A' => 0,
                'B' => 0,
                'C' => 0,
                'D' => 0,
                'E' => 0,
            ];
        }
    }

    public function printPdf() {
        $pdf = Pdf::loadView('welcome', []);
        return $pdf->download('cert.pdf');
        // return Pdf::view('welcome')
        //     // ->format('a4')
        //     ->paperSize(904, 1280) // width x height in millimeters (mm)
        //     ->name('certificate.pdf');
    }

    public function loadQuestion($where)
    {
        $this->questions = QuizItem::where($where)->get()->map(function ($item) {
            return [
                'session' => $item->session,
                'type' => $item->type,
                'question' => $item->question,
                'options' => [
                    'A' => $item->a_answer,
                    'B' => $item->b_answer,
                    'C' => $item->c_answer,
                    'D' => $item->d_answer,
                    'E' => $item->e_answer,
                ],
            ];
        })->toArray();
    }

    public function nextQuestion() {
        $this->questionIndex = $this->questionIndex + 1;
    }

    public function prevQuestion() {
        $this->questionIndex = $this->questionIndex - 1;
    }
}
