@extends('layouts.app')
@section('judul', 'Tambah Roti')

@section('konten')
<form method="POST" action="{{ route('rotis.store') }}">
    @csrf
    <p>Nama: <input type="text" name="nama" required></p>
    <p>Harga: <input type="number" name="harga" required></p>
    <p>Stok: <input type="number" name="stok" required></p>
    <button type="submit" class="btn">Simpan</button>
    <a href="{{ route('rotis.index') }}" class="btn">Kembali</a>
</form>
@endsection
