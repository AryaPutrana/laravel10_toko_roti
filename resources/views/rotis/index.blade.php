@extends('layouts.app')
@section('judul', 'Daftar Produk Roti')

@section('konten')
    <a href="{{ route('rotis.create') }}" class="btn">+ Tambah Roti</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rotis as $roti)
            <tr>
                <td>{{ $roti->nama }}</td>
                <td>Rp{{ number_format($roti->harga, 0, ',', '.') }}</td>
                <td>{{ $roti->stok }}</td>
                <td>
                    <a href="{{ route('rotis.edit', $roti->id) }}" class="btn">Edit</a>
                    <form action="{{ route('rotis.destroy', $roti->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
