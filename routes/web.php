<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('classroom', 'classroom')
    ->middleware(['auth', 'verified'])
    ->name('classroom');

Route::view('student', 'student')
    ->middleware(['auth', 'verified'])
    ->name('student');

Route::view('teacher', 'teacher')
    ->middleware(['auth', 'verified'])
    ->name('teacher');

Route::view('parent', 'parent')
    ->middleware(['auth', 'verified'])
    ->name('parent');

Route::view('listing/student-by-class', 'listings.student-by-class')
    ->middleware(['auth', 'verified'])
    ->name('listing.student-by-class');

Route::view('listing/teacher-by-class', 'listings.teacher-by-class')
    ->middleware(['auth', 'verified'])
    ->name('listing.teacher-by-class');

Route::view('listing', 'listings.all')
    ->middleware(['auth', 'verified'])
    ->name('listing.all');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
