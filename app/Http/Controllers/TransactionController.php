<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Classroom;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SweetAlert2\Laravel\Swal;


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

    public function verification( $id)
    {
        $transaction = Transaction::find($id);
        return view('book.verification', ['transaction' => $transaction, 'title' => 'Verifikasi Peminjaman Buku']);
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

    public function submit($id) {
        $book = Book::find($id);
        $classrooms = Classroom::all();
        return view('book.submit', ['classrooms' => $classrooms, 'book' => $book, 'title' => 'Formulir Pengajuan Peminjaman Buku']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // cek transaksi lama untuk menghindari duplikat
        $transaction = Transaction::where('kelas_peminjam', $request->class)
            ->where('book_id', $request->id)
            ->first();

        if ($transaction) {
            // update kalau sudah pernah pinjam
            $transaction->update([
                'jumlah_buku' => $transaction->jumlah_buku + $request->amount,
            ]);
        } else {
            // transaksi baru
            $transaction = new Transaction();

       
            $image = $request->borrower_image ?? null;

            if ($image) {
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
    
                $imageName = 'borrower_image/' . uniqid() . '.png';
    
                Storage::disk('public')->put($imageName, base64_decode($image));
            }

            $imageName = $imageName ?? null;
            
            if($user->image) {
                $imageName = $user->image;
            }

            // isi data transaksi
            $transaction->borrower_image = $imageName;
            $transaction->kelas_peminjam = $request->class;
            $transaction->book_id = $request->id;
            $transaction->jumlah_buku = $request->amount;
            $transaction->kondisi_buku = $request->kondisi_buku;
            $transaction->borrow_time = now();
            $transaction->save();
        }

   
        $book = Book::findOrFail($request->id);

        $book->update([
            'stock' => $book->stock - $request->amount
        ]);

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Peminjaman Buku Berhasil.',
        ]);

        return redirect('/book/verification/' . $transaction->id)
            ->with('success', 'Silahkan Ambil Buku! 😊');
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
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Buku Berhasil Dikembalikan.',
        ]);
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
