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

    public function getTransaction($id)
    {
        $transactions = Transaction::find($id);
        return response()->json($transactions);
    }

    public function getVerification($id)
    {
        $transaction = Transaction::find($id);
        return view('book.verification', ['transaction' => $transaction, 'title' => 'Verifikasi Peminjaman Buku']);
    }

    public function verificationAdmin($id) {
         $transaction = Transaction::find($id);
        return view('admin.verification', ['transaction' => $transaction, 'title' => 'Verifikasi Peminjaman Buku']);
    }

    public function verification($id)
    {
        $transaction = Transaction::find($id);

        $transaction->update([
            'is_verified' => true
        ]);

        $transaction->save();

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Verifikasi Peminjaman Berhasil.',
        ]);

        return redirect('/');
    }

    public function index()
    {
        //
    }

    public function create($id)
    {
        $book = Book::find($id);
        $classrooms = Classroom::all();
        return view('book.borrow', ['classrooms' => $classrooms, 'book' => $book, 'title' => 'Formulir Peminjaman Buku']);
    }

    public function submit($id)
    {
        $book = Book::find($id);
        $classrooms = Classroom::all();
        return view('book.submit', ['classrooms' => $classrooms, 'book' => $book, 'title' => 'Formulir Pengajuan Peminjaman Buku']);
    }
    public function store(Request $request)
    {


        $user = Auth::user();

        // if ($user->role->name == 'admin') {
        //     $request->validate([
        //         'borrower_image' => 'required',
        //     ]);
        // } else {
        //     $request->validate([
        //         'book_image' => 'required',
        //     ]);
        // }

        // dd($request);

        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|integer|min:1',
            'class' => 'required|string',
        ]);


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

            $borrowImage = $request->borrow_image ?? null;

            if ($borrowImage) {
                $borrowImage = str_replace('data:image/png;base64,', '', $borrowImage);
                $borrowImage = str_replace(' ', '+', $borrowImage);

                $imageName = 'borrow_image/' . uniqid() . '.png';

                Storage::disk('public')->put($imageName, base64_decode($borrowImage));
            }

            // isi data transaksi
            $transaction->kelas_peminjam = $request->class;
            $transaction->book_id = $request->id;
            $transaction->jumlah_buku = $request->amount;
            $transaction->borrow_image = $imageName ?? null;
            $transaction->kondisi_buku = $request->kondisi_buku;
            if ($user->role->name == 'admin') {
                $transaction->is_verified = true;
            }
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


        if ($user->role->name === 'admin') {
            return redirect('/')->with('success', 'Peminjaman buku berhasil');
        }

        return redirect('/book/verification/' . $transaction->id)
            ->with('success', 'Silahkan Ambil Buku! 😊');
    }
    public function submitStore(Request $request)
    {


        $user = Auth::user();

        // if ($user->role->name == 'admin') {
        //     $request->validate([
        //         'borrower_image' => 'required',
        //     ]);
        // } 

        // dd($request);

        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|integer|min:1',
            'class' => 'required|string',
            // 'kondisi_buku' => 'required|string',
        ]);


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

            $borrowImage = $request->borrow_image ?? null;

            if ($borrowImage) {
                $borrowImage = str_replace('data:image/png;base64,', '', $borrowImage);
                $borrowImage = str_replace(' ', '+', $borrowImage);

                $imageName = 'borrow_image/' . uniqid() . '.png';

                Storage::disk('public')->put($imageName, base64_decode($borrowImage));
            }


            $imageName = $imageName ?? null;

            // isi data transaksi
            $transaction->kelas_peminjam = $request->class;
            $transaction->book_id = $request->id;
            $transaction->jumlah_buku = $request->amount;
            $transaction->borrow_image = $imageName ?? null;
            $transaction->kondisi_buku = $request->kondisi_buku;
            if ($user->role->name == 'admin') {
                $transaction->is_verified = true;
            }
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


        if ($user->role->name === 'admin') {
            return redirect('/')->with('success', 'Peminjaman buku berhasil');
        }

        return redirect('/book/verification/' . $transaction->id)
            ->with('success', 'Silahkan Ambil Buku! 😊');
    }
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('book.form', ['book' => $book, 'title' => 'Formulir Peminjaman Buku']);
    }

    public function edit(string $id)
    {
        $book = Book::find($id);
        $borrowed_class = Transaction::where('book_id', '=', $id);
        $borrowed_class = $borrowed_class->where('return_time', '=', null)->get();
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Buku Berhasil Dikembalikan.',
        ]);
        return view('book.return', ['title' => 'Formulir Pengembalian Buku', 'book' => $book, 'transactions' => $borrowed_class]);
    }

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

    public function destroy(string $id)
    {
        
    }
}
