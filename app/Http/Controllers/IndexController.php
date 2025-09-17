<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user() ?? null;

        return view('index', [
            'kelasX' => Book::where('grade_id', 1)->paginate(4),
            'kelasXi' => Book::where('grade_id', 2)->paginate(4),
            'kelasXii' => Book::where('grade_id', 3)->paginate(4),
            'isLogin' => $user,
        ]);



    }
}
