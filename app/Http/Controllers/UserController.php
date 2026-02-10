<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

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
            if ($user->role_id === 2) {
                return redirect('/');
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
            'user_image' => 'required',
        ]);

        $user = User::create([
            'role_id' => $request->role,
            'fullname' => $request->fullname,
            'image' => $request->input('user_image'),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user->save();

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat.');
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
        return view('user.create', ['title' => 'Form Buat Akun Siswa', 'heading' => 'Akun Siswa', 'fullname' => $fullname, 'roles' => $roles, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string',
            'role' => 'required',
        ]);

        if ($validatedData) {

            $duplicateUser = User::where('email', $request->email)->first();
            if ($duplicateUser) {
                Swal::error([
                    'title' => 'Gagal!',
                    'text' => 'Email sudah terdaftar.',
                ]);
                return redirect()->route('admin.user');
            } else {

                $user = User::create([
                    'role_id' => $request->role,
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $user->save();

                Swal::success([
                    'title' => 'Berhasil!',
                    'text' => 'Siswa Berhasil Ditambahkan.',
                ]);

                return redirect()->route('admin.user');
            }

        } else {
            Swal::error([
                'title' => 'Gagal!',
                'text' => 'Siswa Gagal Ditambahkan.',
            ]);
            return redirect()->route('admin.user');
        }

    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            Swal::success([
                'title' => 'Berhasil!',
                'text' => 'Data siswa berhasil dihapus.',
            ]);

            return redirect()->route('admin.user');
        } else {
            Swal::error([
            'title' => 'Gagal!',
            'text' => 'Data siswa gagal dihapus.',
        ]);
            return redirect()->route('admin.user')->with('error', 'Akun tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $account = User::findOrFail($id);
        $user = Auth::user();
        $roles = Role::all();


        return view('user.edit', ['title' => 'Form Edit Akun', 'heading' => 'Edit Akun', 'account' => $account, 'user' => $user, 'roles' => $roles]);
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

            Swal::success([
                'title' => 'Berhasil!',
                'text' => 'Data siswa berhasil diperbarui.',
            ]);

            return redirect()->route('admin.user');
        } else {
            Swal::error([
                'title' => 'Gagal!',
                'text' => 'Data siswa gagal diperbarui.',
            ]);

            return redirect()->route('admin.user');
        }
    }
}
