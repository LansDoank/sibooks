<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function tampil(Request $request)
    {
        $books = Book::all();

        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }

        return view('book.tampil', ['books' => $books]);
    }

    public function pinjam(Request $request)
    {
        $transaction = new Transaction();
        $transaction->kelas_peminjam = $request->kelas;
        $transaction->book_id = $request->id;
        $transaction->jumlah_buku = $request->amount;
        $transaction->borrow_time = now();
        $transaction->save();

        $books = Book::all();
        $books = $books->find($request->id)->update([
            'stock' => $request->stock - $request->amount,
        ]);

        return redirect('/')->with('success','Silahkan Ambil Buku!😊');
    }

    public function pengembalian(Request $request) {
        // Transaction
        $transaction = Transaction::all();
        $transaction = $transaction->find($request->id)->update([
            'jumlah_buku' => $request->amount,
            'return_time' => now()
        ]);

        // Book
        $book = Book::all();
        $book = $book->find($request->book_id)->update([
            'stock' => $request->amount,
        ]);
        // dd($request->id,$book);


        return redirect('/')->with('success','pengembalian buku berhasil');
    }

    public function kelas(Request $request) {
        $books = Book::all();

        if($request->id) {
            $id = $request->id;
            $books = Book::where('kelas_id','=',$id)->get();
        }

        if ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }

        return view('book.kelas',['books' => $books,]);
    }
}
