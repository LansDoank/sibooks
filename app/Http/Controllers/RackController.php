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
