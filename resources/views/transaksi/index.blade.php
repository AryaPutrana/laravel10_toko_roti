@extends('layouts.app')
@section('judul', 'Transaksi Roti')

@section('konten')
@if ($errors->any())
    <div style="color:red">{{ $errors->first() }}</div>
@endif

<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf
    <table>
        <thead>
            <tr>
                <th>Roti</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="transaksiBody">
            <tr>
                <td>
                    <select name="roti_id[]" class="rotiSelect" required>
                        <option value="">-- Pilih Roti --</option>
                        @foreach ($rotis as $roti)
                            <option value="{{ $roti->id }}" data-harga="{{ $roti->harga }}">
                                {{ $roti->nama }}
                            </option>
                        @endforeach
                    </select>
                </td>
                <td class="harga">Rp0</td>
                <td><input type="number" name="jumlah[]" class="jumlahInput" min="1" value="1" required></td>
                <td class="subTotal">Rp0</td>
                <td><button type="button" class="btn btn-danger" onclick="hapusBaris(this)">-</button></td>
            </tr>
        </tbody>
    </table>
    <br>
    <button type="button" class="btn" onclick="tambahBaris()">+ Tambah Roti</button>
    <br><br>
    <button type="submit" class="btn">Simpan Transaksi</button>
</form>

<script>
    function formatRupiah(angka) {
        return 'Rp' + angka.toLocaleString('id-ID');
    }

    function updateSubtotal(row) {
        const harga = parseFloat(row.querySelector('.rotiSelect').selectedOptions[0]?.dataset.harga || 0);
        const jumlah = parseInt(row.querySelector('.jumlahInput').value || 0);
        row.querySelector('.harga').textContent = formatRupiah(harga);
        const subTotal = harga * jumlah;
        row.querySelector('.subTotal').textContent = formatRupiah(subTotal);
    }

    function tambahBaris() {
        const tbody = document.getElementById('transaksiBody');
        const row = tbody.rows[0].cloneNode(true);
        row.querySelector('.jumlahInput').value = 1;
        row.querySelector('.rotiSelect').selectedIndex = 0;
        updateSubtotal(row);
        tbody.appendChild(row);
    }

    function hapusBaris(btn) {
        const row = btn.closest('tr');
        const tbody = document.getElementById('transaksiBody');
        if (tbody.rows.length > 1) {
            row.remove();
        }
    }

    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('rotiSelect') || e.target.classList.contains('jumlahInput')) {
            updateSubtotal(e.target.closest('tr'));
        }
    });

    document.querySelectorAll('#transaksiBody tr').forEach(updateSubtotal);
</script>
@endsection
