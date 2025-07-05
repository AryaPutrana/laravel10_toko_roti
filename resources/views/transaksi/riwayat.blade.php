@extends('layouts.app')
@section('judul', 'Riwayat Transaksi')

@section('konten')
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Nota</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksis as $transaksi)
        <tr>
            <td>{{ $transaksi->id }}</td>
            <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td>
            <td>Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('transaksi.nota', $transaksi->id) }}" class="btn">Lihat Nota</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
