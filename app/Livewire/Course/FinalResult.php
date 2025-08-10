<?php

namespace App\Livewire\Course;

use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class FinalResult extends Component
{
    public $resultId = '';

    public function mount($result_id) {
        $this->resultId = Crypt::decryptString($result_id);
    }

    public function render()
    {
        return view('livewire.course.final-result');
    }
}
