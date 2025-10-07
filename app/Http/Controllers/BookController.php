<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grade;
use App\Models\Kelas;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::all();
        $user = Auth::user();
        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }
        return view('book.tampil', ['books' => $books,'isLogin' => $user]);
    }

    public function kelas(Request $request)
    {
        $books = Book::all();
        $kelas = Kelas::find($request);
        $user = Auth::user();
        $grade = null;

        if ($request->id) {
            $id = $request->id;
            $books = Book::where('grade_id', '=', $id)->get();
            $grade = Grade::where('id', '=',$request->id)->first()->name;
            // dd($grade);
        }

        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }


        return view('book.kelas', ['grade' => $grade, 'books' => $books, 'kelas' => $kelas->value('name'),'isLogin' => $user]);
    }

    public function pengembalian($id)
    {
        $book = Book::find($id);
        $borrowed_class = Transaction::where('book_id', '=', $id);
        $borrowed_class = $borrowed_class->where('return_time', '=', null)->get();
        return view('book.formPengembalian', ['title' => 'Formulir Pengembalian Buku', 'book' => $book, 'transactions' => $borrowed_class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $book = Book::where('slug','=',$slug)->first();
        $user = Auth::user();
        if(!$book) {
            return redirect('/');
        }
        return view('book.detailBook', ['book' => $book,'isLogin' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
