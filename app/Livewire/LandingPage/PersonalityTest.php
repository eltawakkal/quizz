<?php

namespace App\Livewire\LandingPage;

use App\Models\Data\Quiz;
use Livewire\Component;

class PersonalityTest extends Component
{
    public function render()
    {
        $quiz = Quiz::get()->first();

        return view('livewire.landing-page.personality-test', [
            'quiz' => $quiz
        ]);
    }
}
