<?php

use App\Http\Controllers\MainController;
use App\Models\CertificateDetail;
use App\Models\Data\Quiz;
use App\Models\Data\TestResult;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('cert', function () {
//     return view('welcome');
// })->name('cert');

Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('auth/login', App\Livewire\Dashboard\Login::class)->name('auth.login');
Route::get('auth/register', App\Livewire\Dashboard\Register::class)->name('auth.register');
Route::get('auth/forgot', App\Livewire\Auth\Forgot::class)->name('auth.forgot');

Route::get('/', App\Livewire\LandingPage\Index::class)->name('landing-page.index');
Route::get('luaran-penelitian', App\Livewire\LandingPage\LuaranPenelitian::class)->name('landing-page.luaran-penelitian');
Route::get('personality-test', App\Livewire\LandingPage\PersonalityTest::class)->name('landing-page.personality-test');
Route::get('galery', App\Livewire\Data\Galery::class)->name('landing-page.galery');
Route::get('penelitian', App\Livewire\Course\Detail::class)->name('course.detail');
Route::get('hubungi-kami', App\Livewire\LandingPage\ContactUs::class)->name('landing-page.contact-us');
Route::get('syarat-dan-ketentuan', App\Livewire\LandingPage\TermAndCondition::class)->name('landing-page.term-and-condition');
Route::get('personality-test/mulai', App\Livewire\Course\DoTask::class)->name('course.open');
Route::get('personality-test/hasil/{result_id}', App\Livewire\Course\FinalResult::class)->name('course.final-result');
Route::get('personality-test/result/{result_id}', App\Livewire\Course\Result::class)->name('course.result');

Route::get('dashboard', App\Livewire\Dashboard\Index::class)->name('dashboard.index');

Route::get('send-otp', [MainController::class, 'sendOtp'])->name('mail.sendOtp');

Route::get('test', function() {

    return view('mail.otp', [
        'user' => Auth::user()
    ]);

    $user = User::where('email', null)->first();

    if (isset($user)) {
       return 'email ada';
    } else {
        return 'email tidak terdaftar';
    }

    // $quiz = \App\Models\Data\Quiz::with('items', 'category')->get()->first();

    // return $quiz;

    // $type = 'MS-PD';
    // $fixedType = str_replace('-', '_', $type);
    // return [
    //     'type' => $fixedType,
    //     'result'=> CertificateDetail::where('type', 'like', '%' . $fixedType . '%')->get()
    // ];

    // // $testResult = TestResult::create([
    // //     'quiz_id' => 12,
    // //     'user_id' => 14,
    // //     'type' => 'asdf',
    // //     'teaching_type' => 'asdf',
    // //     'teaching_type_desc' => "asdf",
    // //     'teaching_type_dimension' => 'adfs'
    // // ]);

    // // // $lastResult = TestResult::latest()->first();
    // // $id = $testResult->id;
    // // $zero = '00000';
    // // $len = strlen($id);
    // // $removedZero = substr($zero, 0, -$len);
    // // $date = Carbon::now()->format('d.m.Y');
    // // $fixNumber = '127.' . $date . '.' . $removedZero . $id;

    // return [
    //     'id' => $id,
    //     'len' => $len,
    //     'result' => $fixNumber
    // ];

    // return TestResult::with(['quiz'])->get();
    // return Quiz::with('items', 'category')->get();
});
