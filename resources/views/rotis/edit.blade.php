@extends('layouts.app')
@section('judul', 'Edit Roti')

@section('konten')
<form method="POST" action="{{ route('rotis.update', $roti->id) }}">
    @csrf @method('PUT')
    <p>Nama: <input type="text" name="nama" value="{{ $roti->nama }}" required></p>
    <p>Harga: <input type="number" name="harga" value="{{ $roti->harga }}" required></p>
    <p>Stok: <input type="number" name="stok" value="{{ $roti->stok }}" required></p>
    <button type="submit" class="btn">Perbarui</button>
    <a href="{{ route('rotis.index') }}" class="btn">Kembali</a>
</form>
@endsection
