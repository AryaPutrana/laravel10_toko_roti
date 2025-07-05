@extends('layouts.app')
@section('judul', 'Dashboard')

@section('konten')
<div style="display: flex; gap: 20px; flex-wrap: wrap;">
    <div style="flex: 1; min-width: 200px; background: #fef3c7; padding: 16px; border-radius: 8px;">
        <h4>Total Produk Roti</h4>
        <p style="font-size: 24px; font-weight: bold;">{{ $jumlahRoti }}</p>
    </div>
    <div style="flex: 1; min-width: 200px; background: #d1fae5; padding: 16px; border-radius: 8px;">
        <h4>Total Transaksi</h4>
        <p style="font-size: 24px; font-weight: bold;">{{ $jumlahTransaksi }}</p>
    </div>
    <div style="flex: 1; min-width: 200px; background: #e0e7ff; padding: 16px; border-radius: 8px;">
        <h4>Total Pendapatan</h4>
        <p style="font-size: 24px; font-weight: bold;">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    </div>
</div>


@endsection
