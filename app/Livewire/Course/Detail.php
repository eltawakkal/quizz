<?php

namespace App\Livewire\Course;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Detail extends Component
{

    // public $quizId = "";
    public $isLogged = false;

    public function mount()
    {
        // $this->quizId = Crypt::decryptString($course_id);
        $this->isLogged = Auth::check();
    }


    public function render()
    {
        $quiz = \App\Models\Data\Quiz::with('items', 'category')->get()->first();

        return view('livewire.course.detail', [
            'quiz' => $quiz,
        ]);
    }
}
