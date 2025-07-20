<?php

namespace App\Livewire\Course;

use Livewire\Component;

class DoTask extends Component
{

    public $questionIndex = 0;
    public $questions = [
        [
            'text' => 'Apa yang Anda lakukan ketika melihat seseorang membutuhkan bantuan?',
            'options' => [
                'A' => 'Segera membantu tanpa berpikir panjang',
                'B' => 'Meminta bantuan orang lain',
                'C' => 'Mengabaikan dan melanjutkan aktivitas',
                'D' => 'Mencari tahu lebih lanjut sebelum bertindak',
            ],
        ],
        [
            'text' => 'Bagaimana Anda mengatasi stres saat menghadapi deadline?',
            'options' => [
                'A' => 'Bekerja lebih keras dan lebih lama',
                'B' => 'Membagi tugas menjadi bagian yang lebih kecil',
                'C' => 'Menghindari tugas sampai mendekati deadline',
                'D' => 'Beristirahat sejenak untuk menyegarkan pikiran',
            ],
        ],
        [
            'text' => 'Apa yang Anda lakukan ketika menerima kritik dari atasan?',
            'options' => [
                'A' => 'Merasa tersinggung dan defensif',
                'B' => 'Menerima dengan lapang dada dan mencari cara untuk memperbaiki diri',
                'C' => 'Mengabaikan kritik tersebut',
                'D' => 'Mencari dukungan dari rekan kerja',
            ],
        ],
        [
            'text' => 'Bagaimana Anda merespons ketika rencana Anda tidak berjalan sesuai harapan?',
            'options' => [
                'A' => 'Merasa frustrasi dan marah',
                'B' => 'Mencoba mencari solusi alternatif',
                'C' => 'Menyerah dan tidak mencoba lagi',
                'D' => 'Menganalisis kesalahan dan belajar dari pengalaman',
            ],
        ],
        [
            'text' => 'Apa yang Anda lakukan ketika harus bekerja dalam tim?',
            'options' => [          
                'A' => 'Mengambil alih dan memimpin tim',
                'B' => 'Berusaha berkolaborasi dan mendengarkan pendapat orang lain',
                'C' => 'Menghindari tanggung jawab dan membiarkan orang lain bekerja',
                'D' => 'Mencoba menyelesaikan tugas sendiri tanpa bantuan tim',
            ],
        ],
        [
            'text' => 'Bagaimana Anda mengatasi konflik dengan rekan kerja?',
            'options' => [
                'A' => 'Menghindari konflik dan berharap masalahnya hilang',
                'B' => 'Mencoba menyelesaikan konflik dengan komunikasi terbuka',
                'C' => 'Menghadapi konflik dengan cara yang agresif',
                'D' => 'Mencari bantuan dari atasan untuk menyelesaikan konflik',
            ],
        ],
        [
            'text' => 'Apa yang Anda lakukan ketika harus belajar hal baru?',
            'options' => [
                'A' => 'Merasa cemas dan tidak yakin bisa mempelajarinya',
                'B' => 'Mencoba dengan semangat dan mencari sumber belajar yang baik',
                'C' => 'Menghindari belajar hal baru karena merasa sudah cukup',
                'D' => 'Mencari bantuan dari orang lain yang lebih berpengalaman',
            ],
        ],
    ];


    public function render()
    {
        return view('livewire.course.do-task', [
            'questions' => $this->questions,
        ]);
    }

    public function nextQuestion()
    {
        if ($this->questionIndex < count($this->questions) - 1) {
            $this->questionIndex++;
        } else {
            
        }
    }
}
