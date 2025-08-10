<?php

namespace App\Livewire\LandingPage;

use App\Models\Data\Mitra;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        // $quizCategories = \App\Models\Item\QuizCategory::whereHas('quizzes')->paginate(5);
        $testimonies = \App\Models\Data\Testimony::latest()->take(6)->get();
        $mitra = Mitra::all();
        return view('livewire.landing-page.index', [
            // 'quizCategories' => $quizCategories,
            'testimonies' => $testimonies,
            'mitra' => $mitra
        ]);
    }
}
