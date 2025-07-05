<!DOCTYPE html>
<html>
<head>
    <title>@yield('judul') - Toko Roti</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #fff7f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: #fff0f5;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #d63384;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 4px;
        }

        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background: #f472b6;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #ec4899;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #6b2d5c;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>@yield('judul')</h2>
        @yield('konten')
    </div>
</body>
</html>
