<?php

namespace App\Livewire\Course;

use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.course.detail', [
            'remove_sticky' => true,
        ]);
    }
}
