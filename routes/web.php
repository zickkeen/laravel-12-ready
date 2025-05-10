<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth', 'verified', 'role:admin,supervisor'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'verified', 'role:admin,supervisor,operator,user'])->group(function () {
    Route::get('/', function () {
        return view('beranda');
    })->name('beranda');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/user/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::put('/user/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    Route::get('/usercpanel', function () {
        return view('usercpanel');
    })->name('usercpanel');

    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route untuk menampilkan halaman login dan pendaftaran
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Route untuk mengirim ulang email verifikasi
Route::get('/email/verify', function () {
    if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
        return redirect('/dashboard');
    }
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    Auth::user()->activate();
    session()->flash('success', 'Email Anda berhasil diverifikasi!');
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route untuk mengirim ulang email verifikasi
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    $message = 'Link verifikasi telah dikirim ke email Anda.';
    session()->flash('success', $message);
    return back()->with('status', $message);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::fallback(function () {
    return redirect('/'); 
});
