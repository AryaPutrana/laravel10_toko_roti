<?php

namespace App\Http\Controllers;

use App\Models\Roti;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $rotis = Roti::where('stok', '>', 0)->get();
        return view('transaksi.index', compact('rotis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'roti_id.*' => 'required|exists:rotis,id',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $total = 0;
            $data_detail = [];

            foreach ($request->roti_id as $index => $roti_id) {
                $jumlah = $request->jumlah[$index];
                $roti = Roti::findOrFail($roti_id);

                if ($roti->stok < $jumlah) {
                    throw new \Exception("Stok roti '{$roti->nama}' tidak mencukupi.");
                }

                $sub_total = $roti->harga * $jumlah;
                $total += $sub_total;

                $data_detail[] = [
                    'roti_id' => $roti_id,
                    'jumlah' => $jumlah,
                    'sub_total' => $sub_total,
                ];

                // kurangi stok
                $roti->stok -= $jumlah;
                $roti->save();
            }

            $transaksi = Transaksi::create(['total_harga' => $total]);

            foreach ($data_detail as $detail) {
                $detail['transaksi_id'] = $transaksi->id;
                TransaksiDetail::create($detail);
            }

            DB::commit();
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
    public function riwayat()
{
    $transaksis = Transaksi::with('details.roti')->orderBy('created_at', 'desc')->get();
    return view('transaksi.riwayat', compact('transaksis'));
}

public function nota($id)
{
    $transaksi = Transaksi::with('details.roti')->findOrFail($id);
    return view('transaksi.nota', compact('transaksi'));
}

}
