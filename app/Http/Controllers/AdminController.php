<?php

namespace App\Http\Controllers;
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

        if($user->role->name == 'user') {
            return redirect()->route('index');
        }

        return view('admin.index', ['title' => 'Admin Dashboard', 'heading' => 'Admin', 'fullname' => $fullname]);
    }

    public function user()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $accounts = User::all();
        return view('admin.user', ['title' => 'Tabel Akun', 'heading' => 'Akun', 'fullname' => $fullname, 'accounts' => $accounts]);
    }

    public function book()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $books = Book::all();
        return view('admin.book', ['title' => 'Tabel Akun', 'heading' => 'Buku', 'fullname' => $fullname, 'books' => $books]);
    }

    public function transaction()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        if($user->role->name == 'user') {
            return redirect()->route('index');
        }

        $transactions = Transaction::with('book')->get();
        return view('admin.transaction', ['title' => 'Tabel Transaksi','fullname' => $fullname,'heading' => 'Transaksi', 'transactions' => $transactions]);
    }
}