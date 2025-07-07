<!DOCTYPE html>
<html>
<head>
    <title>Toko Roti Amel</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #fff7f0;
            margin: 0;
            display: flex;
        }

        .sidebar {
            width: 220px;
            background-color: #fde2e4;
            height: 100vh;
            padding: 30px 20px;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar h3 {
            margin-bottom: 20px;
            color: #d63384;
        }

        .sidebar a {
            display: block;
            margin-bottom: 12px;
            text-decoration: none;
            color: #6b2d5c;
            background: #fbcfe8;
            padding: 10px 14px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .sidebar a:hover {
            background: #f472b6;
            color: white;
        }

        .sidebar form {
            margin-top: 20px;
        }

        .sidebar button {
            width: 100%;
            background: #fca5a5;
            color: white;
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .sidebar button:hover {
            background: #ef4444;
        }

        .main {
            margin-left: 240px;
            padding: 30px;
            flex-grow: 1;
        }

        h2 {
            color: #d63384;
            margin-bottom: 24px;
        }

        .alert-success {
            background-color: #d1fae5;
            border: 1px solid #10b981;
            color: #065f46;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .btn {
            padding: 10px 16px;
            background: #f472b6;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-right: 8px;
        }

        .btn:hover {
            background: #ec4899;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
            white-space: nowrap;
        }

        table th {
            background-color: #fcd5ce;
            color: #6b2d5c;
            text-align: left;
        }

        /* Kolom Harga rata kanan */
        table th:nth-child(2), table td:nth-child(2) {
            text-align: right;
            width: 120px;
        }

        /* Kolom Stok rata tengah */
        table th:nth-child(3), table td:nth-child(3) {
            text-align: center;
            width: 80px;
        }

        /* Kolom Aksi rata tengah */
        table th:nth-child(4), table td:nth-child(4) {
            text-align: center;
            width: 160px;
        }

        /* Striped rows */
        table tbody tr:nth-child(even) {
            background-color: #fef2f2;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

    <div class="sidebar">
        <div>
            <h3>🍞 Bake Fyne</h3>
            <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
            <a href="{{ route('rotis.index') }}">🥐 Kelola Produk</a>
            <a href="{{ route('transaksi.index') }}">🛒 Transaksi</a>
            <a href="{{ route('transaksi.riwayat') }}">🧾 Riwayat</a>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">🚪 Logout</button>
        </form>
    </div>

    <div class="main">
        <h2>@yield('judul')</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @yield('konten')
    </div>

</body>
</html>
