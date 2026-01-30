<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getMonthly()
    {
        $monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

        $data = DB::table('transactions')
            ->selectRaw('MONTH(borrow_time) as bulan, COUNT(*) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get()
            ->map(function ($item) use ($monthNames) {
                return [
                    'label' => $monthNames[$item->bulan - 1], // Mengubah 1 jadi Jan, dst
                    'total' => $item->total,
                ];
            });

        return response()->json($data);
    }

    public function getBookStatus()
{
    // 1. Hitung TOTAL JENIS BUKU yang ada di perpustakaan (Total: 27)
    $totalJenisBuku = \DB::table('books')->count();

    // 2. Hitung berapa JENIS BUKU yang SEDANG DIPINJAM (Total: 3)
    // Kita gunakan distinct() agar jika 1 judul buku dipinjam 10 orang, tetap dihitung 1 jenis buku
    $jenisBukuDipinjam = \DB::table('transactions')
        ->whereNull('return_time')
        ->distinct('book_id')
        ->count('book_id');

    // 3. Hitung sisa JENIS BUKU yang TERSEDIA (27 - 3 = 24)
    $jenisBukuTersedia = $totalJenisBuku - $jenisBukuDipinjam;

    return response()->json([
        'labels' => ['Sedang Dipinjam', 'Tersedia'],
        'totals' => [
            $jenisBukuDipinjam, // Hasilnya: 3
            $jenisBukuTersedia  // Hasilnya: 24
        ]
    ]);
}
}
