@extends('layouts.guest')
@section('judul', 'Login')

@section('konten')
<form method="POST" action="/login">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <button class="btn">Login</button>
</form>
<p>Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
@endsection
