<?php

namespace App\Livewire\LandingPage;

use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $position;
    public $instantion;
    public $message;
    
    public function render()
    {
        return view('livewire.landing-page.contact-us');
    }
}
