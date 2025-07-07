@extends('layouts.app')
@section('judul', 'Dashboard')

@section('konten')
<div style="display: flex; gap: 20px; flex-wrap: wrap;">
    <div style="flex: 1; min-width: 200px; background: #fef3c7; padding: 16px; border-radius: 8px;">
        <h4>Total Produk Roti</h4>
        <p style="font-size: 24px; font-weight: bold;">{{ $jumlahRoti }}</p>
    </div>
    <div style="flex: 1; min-width: 200px; background: #d1fae5; padding: 16px; border-radius: 8px;">
        <h4>Total Transaksi</h4>
        <p style="font-size: 24px; font-weight: bold;">{{ $jumlahTransaksi }}</p>
    </div>
    <div style="flex: 1; min-width: 200px; background: #e0e7ff; padding: 16px; border-radius: 8px;">
        <h4>Total Pendapatan</h4>
        <p style="font-size: 24px; font-weight: bold;">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    </div>
</div>

<h3 style="margin-top: 40px; color: #6b2d5c;">📊 Grafik Transaksi per Hari</h3>
<canvas id="grafikTransaksi" width="400" height="200"></canvas>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($chartData->pluck('tanggal'));
    const dataJumlah = @json($chartData->pluck('jumlah'));
    const dataPendapatan = @json($chartData->pluck('total'));

    const ctx = document.getElementById('grafikTransaksi').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Jumlah Transaksi',
                    data: dataJumlah,
                    backgroundColor: '#fbbf24'
                },
                {
                    label: 'Total Pendapatan',
                    data: dataPendapatan,
                    backgroundColor: '#34d399'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
