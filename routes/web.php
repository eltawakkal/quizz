<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\LandingPage\Index::class)->name('landing-page.index');
Route::get('psikotes/test/{course_name}', App\Livewire\Course\DoTask::class)->name('course.open');
Route::get('psikotes/detail/{course_name}', App\Livewire\Course\Detail::class)->name('course.detail');
