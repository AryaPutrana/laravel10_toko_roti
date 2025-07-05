@extends('layouts.guest')
@section('judul', 'Register')

@section('konten')
<form method="POST" action="/register">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password:</label>
    <input type="password" name="password_confirmation" required><br><br>

    <button class="btn">Register</button>
</form>
<p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
@endsection
