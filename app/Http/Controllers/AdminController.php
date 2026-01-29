<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Role;
use App\Models\School;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $siswa = User::where('role_id', 2)->count();
        $book = Book::all()->count();
        $transactions = Transaction::all()->count();
        $kelas = Classroom::all()->count();

        return view('admin.index', ['title' => 'Admin Dashboard', 'heading' => 'Admin', 'fullname' => $fullname, 'user' => $user, 'siswa' => $siswa, 'book' => $book, 'transactions' => $transactions, 'kelas' => $kelas]);
    }
    public function login()
    {
        return view('admin.login');
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
                return redirect('/admin/login')->withErrors(['login' => 'Akses ditolak.']);
            }
        } else {
            return redirect('/admin/login')->withErrors(['login' => 'Username atau password salah']);
        }
    }

    public function user()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $accounts = User::all();
        return view('admin.user', ['title' => 'Tabel Siswa', 'heading' => 'Siswa', 'fullname' => $fullname, 'accounts' => $accounts, 'user' => $user]);
    }

    public function book()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $books = Book::all();
        return view('admin.book', ['title' => 'Tabel Akun', 'heading' => 'Buku', 'fullname' => $fullname, 'books' => $books, 'user' => $user]);
    }

    public function transaction()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $transactions = Transaction::with('book')->get();
        return view('admin.transaction', ['title' => 'Tabel Transaksi', 'fullname' => $fullname, 'heading' => 'Transaksi', 'transactions' => $transactions, 'user' => $user]);
    }

    public function class()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $class = Classroom::all();

        return view('admin.class', ['title' => 'Tabel Kelas', 'fullname' => $fullname, 'heading' => 'Kelas', 'user' => $user, 'classes' => $class]);
    }

    public function school()
    {
        $user = Auth::user();
        $fullname = $user->fullname;
        $school = School::first();

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        return view('admin.data', ['title' => 'Data Sekolah', 'heading' => 'Data Sekolah', 'fullname' => $fullname, 'user' => $user, 'school' => $school]);
    }

    public function schoolUpdate(Request $request)
    {
        $user = Auth::user();

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        // 1. Perbaiki Validasi (Logo harus image, bukan string)
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:20',
        ]);

        // Ambil data pertama yang tersedia
        $school = School::first();

        // Siapkan data untuk update
        $dataToUpdate = [
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
        ];

        // Logika upload logo tetap sama...
        if ($request->hasFile('logo')) {
            if ($school && $school->logo) {
                Storage::disk('public')->delete($school->logo);
            }
            $dataToUpdate['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // UPDATE ATAU CREATE berdasarkan data pertama
        if ($school) {
            $school->update($dataToUpdate);
        } else {
            School::create($dataToUpdate);
        }

        return redirect()->route('admin.data')->with('success', 'Data sekolah berhasil diperbarui.');
    }
}