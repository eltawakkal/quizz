<?php

namespace App\Livewire\Dashboard;

use App\Models\Data\TestResult;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $menu = 0;
    public $isEdit = false;

    public $name;
    public $instantion;
    public $position;
    public $genderId;

    public function mount() {
        if(!Auth::check()) {
            return redirect(route('auth.login'));
        }

        $user = Auth::user();

        $this->name = $user->name;
        $this->instantion = $user->instantion;
        $this->position = $user->position;
        $this->genderId = $user->gender_id;
    }

    public function render()
    {
        $user = Auth::user();
        $testResult = TestResult::with(['quiz'])
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('livewire.dashboard.index', [
            'user' => $user,
            'testResult' => $testResult
        ]);
    }

    public function setMenu($menu) {
        $this->menu = $menu;
    }

    public function logout() {
        Auth::logout();
        return redirect(route('auth.login'));
    }

    public function editButton() {
        $this->isEdit = !$this->isEdit;
    }

    public function update() {
        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'instantion' => $this->instantion,
            'position' => $this->position,
            'gender_id' => $this->genderId,
        ]);

        $user->fresh();
        $this->isEdit = false;
    }
}
