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

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role_id === 1) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('index');
            }
        } else {
            return redirect('/user/login')->withErrors(['login' => 'Username atau password salah']);
        }
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



    public function create()
    {
        $user = Auth::user();
        $fullname = $user->fullname;
        $roles = Role::all();
        return view('user.create', ['title' => 'Form Buat Akun', 'heading' => 'Akun', 'fullname' => $fullname, 'roles' => $roles, 'user' => $user]);
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

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.user')->with('success', 'Akun berhasil dihapus.');
        } else {
            return redirect()->route('admin.user')->with('error', 'Akun tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $account = User::findOrFail($id);
        $user = Auth::user();
        $roles = Role::all();


        return view('user.edit', ['title' => 'Form Edit Akun', 'heading' => 'Edit Akun', 'account' => $account, 'user' => $user,'roles' => $roles]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'role' => 'required',
        ]);

        $user = User::find($request->id);
        if ($user) {
            $user->role_id = $request->role;
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->updated_at = now();
            $user->save();

            return redirect()->route('admin.user')->with('success', 'Akun berhasil diupdate.');
        } else {
            return redirect()->route('admin.user')->with('error', 'Akun tidak ditemukan.');
        }
    }
}
