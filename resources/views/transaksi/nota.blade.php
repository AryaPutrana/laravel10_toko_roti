@extends('layouts.app')
@section('judul', 'Nota Transaksi #' . $transaksi->id)

@section('konten')
<style>
    .nota-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .nota-header h2 {
        margin: 0;
        color: #6b2d5c;
    }

    .nota-header p {
        margin: 4px 0;
        color: #4b5563;
    }

    @media print {
        .sidebar,
        .btn,
        .alert-success {
            display: none !important;
        }

        body {
            background: white !important;
            margin: 0;
        }

        .main {
            margin: 0 !important;
            padding: 0 30px !important;
            width: 100% !important;
        }

        table {
            font-size: 14px;
        }

        h2 {
            color: black;
        }
    }
</style>

<div class="nota-header">
    <h2>Toko Roti Amel</h2>
    <p><strong>Nota Transaksi #{{ $transaksi->id }}</strong></p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y H:i') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Nama Roti</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Sub Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksi->details as $detail)
        <tr>
            <td>{{ $detail->roti->nama }}</td>
            <td>Rp{{ number_format($detail->roti->harga, 0, ',', '.') }}</td>
            <td>{{ $detail->jumlah }}</td>
            <td>Rp{{ number_format($detail->sub_total, 0, ',', '.') }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
            <td><strong>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</strong></td>
        </tr>
    </tbody>
</table>

<br>
<button onclick="window.print()" class="btn">🖨️ Cetak Nota</button>
<a href="{{ route('transaksi.riwayat') }}" class="btn">Kembali</a>
@endsection
