<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AuthenticateMiddleware;

Route::middleware(['auth', 'role:admin,supervisor'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'role:admin,supervisor,operator,user'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

