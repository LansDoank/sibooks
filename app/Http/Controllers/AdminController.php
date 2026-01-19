<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Role;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if ($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $siswa = User::where('role_id',2)->count();
        $book = Book::all()->count();
        $transactions = Transaction::all()->count();
        $kelas = Classroom::all()->count();

        return view('admin.index', ['title' => 'Admin Dashboard', 'heading' => 'Admin', 'fullname' => $fullname, 'user' => $user,'siswa'=>$siswa,'book'=>$book,'transactions'=>$transactions,'kelas'=>$kelas]);
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
}