<?php

namespace App\Livewire\Auth;

use App\Mail\MailSenderQ;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class Forgot extends Component
{
    public $isSuccess = false;
    public $showPass = false;
    public $errMessage;
    public $randomNumber;

    public $email;
    public $otp;
    public $password;
    public $re_password;

    public function render()
    {
        return view('livewire.auth.forgot', [

        ]);
    }

    public function sendOtp() {
        $this->errMessage = '';
        if (!$this->isSuccess) {
            $this->randomNumber = rand(1000, 9999);
        }

        $email = $this->email;
        $user = User::where('email', $email)->first();

        if ($this->isSuccess) {
            $pass = $this->password;
            $rePass = $this->re_password;
            
            if (strcasecmp($pass, $rePass) === 0) {
                if ($this->randomNumber == $this->otp) {

                    try {
                        User::where('email', $email)->update([
                            'password' => bcrypt($pass)
                        ]);   

                        return redirect(route('auth.login'));
                    } catch (Exception $e) {
                        return $e;
                    }
                    
                } else {
                    $this->errMessage = 'OTP Tidak Valid';    
                }
            } else {
                $this->errMessage = 'Konfirmasi Sandi tidak sama';
            }
        } else {
            if (isset($user)) {
                $user->update(['remember_token' => $this->randomNumber]);
                Mail::to($email)->send(new MailSenderQ($user));
                $this->isSuccess = true;
            } else if($email == '') {
                $this->errMessage = '*Harap isi email Anda';
            } else {
                $this->errMessage = '*Ups.. email tidak terdaftar';
            }
        }
    }
}
