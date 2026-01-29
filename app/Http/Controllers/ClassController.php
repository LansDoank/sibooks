<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;

class ClassController extends Controller
{

    public function create()
    {
        $user = Auth::user();
        return view('class.create', ['title' => 'Form Tambah Kelas', 'heading' => 'Tambah Kelas','user' => $user]);
    }

    public function store(Request $request)
    {
        $class = new Classroom();
        $class->name = $request->name;
        $class->created_at = now();
        $class->updated_at = now();
        $class->save();

        Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Data kelas berhasil ditambahkan.',
        ]);

        return redirect()->route('admin.class')->with('success', 'Kelas berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $class = Classroom::findOrFail($id);
        $user = Auth::user();

        return view('class.edit', ['title' => 'Form Edit Kelas', 'heading' => 'Edit Kelas', 'class' => $class, 'user' => $user]);
    }

    public function update(Request $request)
    {
        $class = Classroom::findOrFail($request->id);
        $user = Auth::user();

        if ($class) {
            $class->name = $request->name;
            $class->updated_at = now();
            $class->save();

            Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Data kelas berhasil diperbarui.',
        ]);
            return redirect()->route('admin.class')->with('success', 'Kelas berhasil diupdate.');
        } else {
            Swal::error([
            'title' => 'Gagal!',
            'text' => 'Data kelas gagal ditambahkan.',
        ]);
            return redirect()->route('admin.class')->with('error', 'Kelas tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        $class = Classroom::findOrFail($id);
        if ($class) {
            Swal::success([
            'title' => 'Berhasil!',
            'text' => 'Data kelas berhasil dihapus.',
        ]);
            $class->delete();
        }
        return redirect()->route('admin.class');
    }
}
