<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

class RackController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user() ?? null;
        $school = School::first() ?? null;
        $books = Book::all();

        if ($request->name) {
            $rack = Rack::where('name', $request->name)->first();
            $books = Book::where('rack_id', $rack->id)->get();
        } elseif ($request->search) {
            $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        }

        return view('book.rack', ['isLogin' => $user, 'school' => $school, 'books' => $books]);
    }

    public function create()
    {
        $user = Auth::user();
        $fullname = $user->fullname;

        $racks = Rack::all();

        return view('rack.create', ['title' => 'Form Buat Buku', 'heading' => 'Buku', 'fullname' => $fullname, 'user' => $user,]);
    }

    public function store(Request $request)
    {
        $rack = Rack::create([
            'name' => $request->name,
            'qr_code' => config('app.url') . '?rack=' . $request->name,
            'category' => $request->category,
        ]);

        $rack->save();

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Data rak berhasil ditambahkan.',
        ]);

        return redirect('/admin/rack');
    }

    public function edit($id)
    {
        $rack = Rack::findOrFail($id);
        $user = Auth::user();
        $fullname = $user->fullname;

        return view('rack.edit', ['title' => 'Form Edit Rak', 'heading' => 'Rak', 'fullname' => $fullname, 'user' => $user, 'rack' => $rack]);
    }

    public function update(Request $request)
    {
        $rack = Rack::findOrFail($request->id);
        $rack->name = $request->name;
        $rack->category = $request->category;
        $rack->qr_code = config('app.url') . '?rack=' . $request->name;

        $rack->save();

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Data rak berhasil diubah.',
        ]);

        return redirect('/admin/rack');
    }

    public function destroy($id)
    {
        Book::where('rack_id', $id)->update(['rack_id' => null]);

        $rack = Rack::findOrFail($id);
        $rack->delete();
        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Data rak berhasil dihapus.',
        ]);
        return redirect('/admin/rack');
    }

    public function map()
    {
        $user = Auth::user();
        $fullname = $user->fullname;
        return view('rack.map', ['title' => 'Form Edit Denah Rak', 'heading' => 'Denah Rak', 'fullname' => $fullname, 'user' => $user]);

    }

    public function mapPost(Request $request)
    {
        $request->validate([
            'map' => 'required|mimes:svg|max:2048'
        ]);

        $file = $request->file('map');

        // nama file fix
        $namaFile = 'denah-perpus.svg';

        // simpan ke public/storage/img
        $file->storeAs('img', $namaFile, 'public');

        return redirect('/admin/rack')->with('success', 'Map berhasil diupload');
    }
}
