<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Kelas;
use App\Models\Role;
use App\Models\School;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::all();
        $user = Auth::user();
        $school = School::first() ?? null;

        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }
        return view('book.tampil', ['books' => $books, 'isLogin' => $user,'school' => $school]);
    }

    public function kelas(Request $request)
    {
        $books = Book::all();
        $grade = Grade::find($request);
        $user = Auth::user();
        $grade = null;
        $school = School::first() ?? null;


        if ($request->id) {
            $id = $request->id;
            $books = Book::where('grade_id', '=', $id)->get();
            $grade = Grade::where('id', '=', $request->id)->first()->name;
            // dd($grade);
        }

        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }


        return view('book.kelas', ['grade' => $grade, 'books' => $books,  'isLogin' => $user,'school' => $school]);
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
        $user = Auth::user();
        $fullname = $user->fullname;
        $books = Book::all();
        $grades = Grade::all();
        // $roles = Role::all();
        return view('book.create', ['title' => 'Form Buat Buku', 'heading' => 'Buku', 'fullname' => $fullname, 'user' => $user, 'books' => $books, 'grades' => $grades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'stock' => 'required|int|max:255',
        //     'grade' => 'required|int|max:255',
        // ]);

        $book = Book::create([
            'qr_code' => config('app.url') . '/book/' . Str::slug($request->title),
            'image' => $request->file('image'),
            'title' => $request->title,
            'stock' => $request->stock,
            'grade_id' => $request->grade,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'year' => $request->year,
        ]);


        $book->save();

        return redirect('/admin/book');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $book = Book::where('slug', '=', $slug)->first();
        $user = Auth::user();
        $school = School::first() ?? null;

        if (!$book) {
            return redirect('/');
        }
        return view('book.detailBook', ['book' => $book, 'isLogin' => $user,'school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $grades = Grade::all();

        return view('book.edit', ['title' => 'Edit Buku', 'heading' => 'Buku', 'book' => Book::find($id), 'user' => $user,'grades'=>$grades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        $book = Book::findOrFail($request->id);
        $book->title = $request->title;
        $book->stock = $request->stock;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->year = $request->year;
        $book->grade_id = $request->class;
        $book->save();

        return redirect('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect('/admin/book');
    }

    public function pdf() {
        return view('book.pdf',['books' => Book::all(),'title'=>'Laporan Data Buku']);
    }
}
