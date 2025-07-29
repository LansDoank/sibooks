<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Classroom;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getTransaction($id)
    {
        $transactions = Transaction::find($id);
        return response()->json($transactions);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $book = Book::find($id);
        $classrooms = Classroom::all();
        return view('book.formPeminjaman', ['classrooms' => $classrooms, 'book' => $book, 'title' => 'Formulir Peminjaman Buku']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = Transaction::where('kelas_peminjam', '=', $request->kelas)->where('book_id', '=', $request->id)->first();
        if ($transaction) {
            $transaction->update([
                'jumlah_buku' => $transaction->jumlah_buku + $request->amount,
            ]);
        } else {
            $transaction = new Transaction();
            $borrower_image = $request->file('borrower-image');
            $transaction->borrower_image = $borrower_image->store('borrower_image');
            $transaction->kelas_peminjam = $request->class;
            $transaction->book_id = $request->id;
            $transaction->jumlah_buku = $request->amount;
            $transaction->borrow_time = now();
            $transaction->save();
        }


        $books = Book::all();
        $books = $books->find($request->id)->update([
            'stock' => $request->stock - $request->amount,
        ]);

        return redirect('/')->with('success', 'Silahkan Ambil Buku!😊');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('book.form', ['book' => $book, 'title' => 'Formulir Peminjaman Buku']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $borrowed_class = Transaction::where('book_id', '=', $id);
        $borrowed_class = $borrowed_class->where('return_time', '=', null)->get();
        return view('book.formPengembalian', ['title' => 'Formulir Pengembalian Buku', 'book' => $book, 'transactions' => $borrowed_class]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Transaction
        $transaction = Transaction::all();
        $transaction = $transaction->find($request->id)->update([
            'jumlah_buku' => $request->amount,
            'return_time' => now()
        ]);

        // Book
        $book = Book::find($request->book_id)->update([
            'stock' => $request->old_stock + $request->amount,
        ]);


        return redirect('/')->with('success', 'pengembalian buku berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
