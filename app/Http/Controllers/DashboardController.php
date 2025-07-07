<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
    {
        $jumlahRoti = \App\Models\Roti::count();
        $jumlahTransaksi = Transaksi::count();
        $totalPendapatan = Transaksi::sum('total_harga');
    
        // Data grafik: transaksi per hari
        $chartData = Transaksi::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('COUNT(*) as jumlah'),
            DB::raw('SUM(total_harga) as total')
        )
        ->groupBy('tanggal')
        ->orderBy('tanggal', 'asc')
        ->get();
    
        return view('dashboard.index', compact(
            'jumlahRoti',
            'jumlahTransaksi',
            'totalPendapatan',
            'chartData'
        ));
    }
}
