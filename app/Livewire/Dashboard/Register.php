<?php

namespace App\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $genderId = 1;
    public $position = 'Guru';
    public $instantion;
    public $email;
    #[Validate('min:6', message: 'Sandi Minimal 6 Karakter')]
    public $password;
    public $phone;

    public function render()
    {
        return view('livewire.dashboard.register');
    }

    public function store() {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'gender_id' => $this->genderId,
            'position' => $this->position,
            'instantion' => $this->instantion,
            'role' => 'User',
            'phone_number' => $this->phone,
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        Auth::attempt($credentials);

        $currUrl = Session::get('currUrl');

        if (isset($currUrl)) {
            return redirect($currUrl);
        }

        return redirect(route('dashboard.index'));
    }
}
