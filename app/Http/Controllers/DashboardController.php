<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahRoti = Roti::count();
        $jumlahTransaksi = Transaksi::count();
        $totalPendapatan = Transaksi::sum('total_harga');

        return view('dashboard.index', compact('jumlahRoti', 'jumlahTransaksi', 'totalPendapatan'));
    }
}
