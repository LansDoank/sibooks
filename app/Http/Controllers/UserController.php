<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            'role' => 'required',
        ]);

        $user = User::create([
            'role_id' => $request->role,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->save();

        return redirect()->route('user.login')->with('success', 'Akun berhasil dibuat.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('index')->with('isLogin', false);
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect('/user/login')->withErrors(['login' => 'Username atau password salah']);
        }
    }

    public function create()
    {
        $user = Auth::user();
        $fullname = $user->fullname;
        $roles = Role::all();
        return view('user.create', ['title' => 'Form Buat Akun', 'heading' => 'Akun', 'fullname' => $fullname, 'roles' => $roles]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            'role' => 'required',
        ]);

        $user = User::create([
            'role_id' => $request->role,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->save();

        return redirect()->route('admin.user')->with('success', 'Akun berhasil dibuat.');
    }

}
