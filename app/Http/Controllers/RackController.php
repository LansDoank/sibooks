<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

class RackController extends Controller
{

     public function create()
    {
        $user = Auth::user();
        $fullname = $user->fullname;
        
        $racks = Rack::all();

        return view('rack.create', ['title' => 'Form Buat Buku', 'heading' => 'Buku', 'fullname' => $fullname, 'user' => $user, ]);
    }

    public function store(Request $request)
    {
        $rack = Rack::create([
            'name' => $request->name,
            'qr_code'=> config('app.url') . '?rack=' . $request->name,
            'category'=> $request->category,
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
}
