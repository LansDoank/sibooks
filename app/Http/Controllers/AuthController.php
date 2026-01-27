<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use SweetAlert2\Laravel\Swal;

class AuthController extends Controller
{

    public function login()
    {
        return view('user.login', ['title' => 'Login Sebagai']);
    }

    public function choose()
    {
        return view('auth.choose', ['title' => 'Login Sebagai']);
    }

    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function google_callback()
    {
        $googleUser = Socialite::driver('google')->user();
        // dd($googleUser);
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            $user = User::create([
                'fullname' => $googleUser->name,
                'image' => $googleUser->avatar,
                'email' => $googleUser->email,
                'role_id' => 2,
            ]);
        }
        Auth::login($user);
        return redirect()->route('index');
    }
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Swal::success([
                'title' => 'Berhasil!',
                'text' => 'Login berhasil.',
            ]);

            if ($user->role_id === 1) {
                return redirect('/admin');
            } else if ($user->role_id === 2) {
                return redirect()->route('index');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect('/login')->withErrors(['login' => 'Username atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('index')->with('isLogin', false);
    }
}
