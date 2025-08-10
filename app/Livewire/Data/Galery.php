<?php

namespace App\Livewire\Data;

use App\Models\Data\Galery as DataGalery;
use Livewire\Component;

class Galery extends Component
{
    public function render()
    {
        $galeries = DataGalery::all();

        return view('livewire.data.galery', [
            'galeries' => $galeries
        ]);
    }
}
