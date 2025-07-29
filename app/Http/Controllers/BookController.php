<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Grade;
use App\Models\Kelas;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::all();
        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }
        return view('book.tampil', ['books' => $books]);
    }

    public function kelas(Request $request) {
        $books = Book::all();
        $kelas = Kelas::find($request);

        if($request->id) {
            $id = $request->id;
            $books = Book::where('grade_id','=',$id)->get();
        }

        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }

        $grade = Grade::find($request->id)->name;

        return view('book.kelas',['grade' => $grade,'books' => $books,'kelas' => $kelas->value('name')]);
    }

    public function pengembalian($id) {
        $book = Book::find($id);
        $borrowed_class = Transaction::where('book_id','=',$id);
        $borrowed_class = $borrowed_class->where('return_time','=',null)->get();
        return view('book.formPengembalian',['title' => 'Formulir Pengembalian Buku','book' => $book,'transactions' => $borrowed_class]);
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
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.detailBook', ['book' => $book]);
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
