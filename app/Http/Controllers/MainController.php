<?php

namespace App\Http\Controllers;

use App\Mail\MailSenderQ;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

// use Spatie\LaravelPdf\Facades\Pdf;

class MainController extends Controller
{
    function print() {
        $html = view('welcome')->render();
        $pdf = Pdf::loadHtml($html);
        return $pdf->stream('invoice-' . 'adfsdf' . '.pdf');

        // $pdf = Pdf::loadView('welcome', []);
        // return $pdf->download('cert.pdf');

        // return Pdf::view('welcome')
        //     ->format('a4')
        //     // ->paperSize(904, 1280) // width x height in millimeters (mm)
        //     ->name('certificate.pdf');
    }

    function sendOtp($email) {
        $decryptedEmail = Crypt::decryptString($email);
        Mail::to('fadhlicoc1@gmail.com')->send(new MailSenderQ());
    }
}
