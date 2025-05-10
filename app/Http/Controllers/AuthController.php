<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'login' => 'required', // Bisa email atau username
            'password' => 'required',
        ]);

        // Cek apakah input berupa email atau username
        $login = $request->input('login');
        
        $user = filter_var($login, FILTER_VALIDATE_EMAIL) ? User::where('email', $login)->first() : User::where('username', $login)->first();

        // Jika user ditemukan dan password benar
        if ($user && Auth::attempt(['id' => $user->id, 'password' => $request->password, 'active' => true])) {
            return redirect()->intended('dashboard');
        }

        // Jika gagal login
        return back()->withErrors([
            'login' => __('auth.failed'),
            // 'login' => 'Kredensial yang diberikan tidak valid.',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'active' => false,
        ]);

        // Trigger event untuk mengirim email verifikasi
        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
