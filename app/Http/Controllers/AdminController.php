<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $username = Auth::user()->username;
        return view('admin.index',['title' => 'Admin Dashboard','heading' => 'Admin','username' =>$username]);
    }

    public function akun() {
        $username = Auth::user()->username;
        $accounts = User::all(); 
        return view('admin.akun',['title' => 'Tabel Akun','heading' => 'Akun','username' =>$username,'accounts' => $accounts]);
    }

    public function buku() {
        $username = Auth::user()->username;
        $books = Book::all();
        return view('admin.buku',['title' => 'Tabel Akun','heading' => 'Buku','username' =>$username,'books' => $books]);
    }
}
