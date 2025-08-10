<?php

namespace App\Livewire\Dashboard;

use Flasher\Toastr\Laravel\Facade\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;
    public $isWrong = false;
    public $currUrl;

    public function mount() {
        $this->currUrl = Session::get('currUrl');
        $isLogged = Auth::check();

        if ($isLogged) {
            return redirect('/');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.login');
    }

    public function login() {
        $this->isWrong = false;
        
        $data = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($data)) {
            $currUrl = $this->currUrl;
            if (isset($currUrl)) {
                Session::remove('currUrl');
                return redirect($currUrl);
            }
            return redirect(route('dashboard.index'));
        } else {
            $this->isWrong = true;
        }
    }
}
