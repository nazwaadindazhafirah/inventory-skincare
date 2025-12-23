@extends('layouts.app')

@section('content')

<h4 class="mb-4">Dashboard Inventory Skincare</h4>

<!-- ===== KARTU RINGKASAN ===== -->
<div class="row mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Total Produk</p>
                <h3>{{ $totalProduk }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Stok Aman</p>
                <h3 class="text-success">{{ $stokAman }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Hampir Habis</p>
                <h3 class="text-warning">{{ $stokHampirHabis }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <p>Stok Habis</p>
                <h3 class="text-danger">{{ $stokHabis }}</h3>
            </div>
        </div>
    </div>

</div>

<!-- ===== TABEL PRODUK ===== -->
<div class="card shadow-sm mb-5">
    <div class="card-body">
        <h5 class="mb-3">Tabel Laporan Produk</h5>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if ($product->stock == 0)
                            <span class="badge bg-danger">Habis</span>
                        @elseif ($product->stock <= 5)
                            <span class="badge bg-warning text-dark">Hampir Habis</span>
                        @else
                            <span class="badge bg-success">Aman</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- FOTO PRODUK --}}
<h5 class="mb-3">Produk Unggulan</h5>

<div class="row mb-5">

@php
$produkUnggulan = [
    ['img'=>'serum.jpeg','nama'=>'Serum Wajah','desc'=>'Membantu mencerahkan dan melembabkan kulit.'],
    ['img'=>'facialwash.jpeg','nama'=>'Facial Wash','desc'=>'Membersihkan wajah dari kotoran dan minyak.'],
    ['img'=>'moisturizer.jpeg','nama'=>'Moisturizer','desc'=>'Menjaga kelembaban kulit sepanjang hari.'],
    ['img'=>'toner.jpeg','nama'=>'Toner','desc'=>'Menyegarkan dan menyeimbangkan pH kulit.'],
    ['img'=>'sunscreen.jpeg','nama'=>'Sunscreen','desc'=>'Melindungi kulit dari sinar UV hingga melembabkan muka terhindar dari sinar matahari.'],
    ['img'=>'masker.jpeg','nama'=>'Masker Wajah','desc'=>'Menutrisi kulit agar tetap sehat.'],
];
@endphp

@foreach ($produkUnggulan as $p)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <img src="{{ asset('images/'.$p['img']) }}" class="card-img-top">
            <div class="card-body">
                <h6>{{ $p['nama'] }}</h6>
                <p class="text-muted">{{ $p['desc'] }}</p>
            </div>
        </div>
    </div>
@endforeach

</div>

{{-- GRAFIK --}}
<h5 class="mb-3">Grafik Stok Produk</h5>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <canvas id="stokChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <canvas id="kategoriChart"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- KETERANGAN --}}
<div class="alert alert-info">
    Grafik pertama menunjukkan jumlah stok tiap produk.  
    Grafik kedua memperlihatkan distribusi stok produk.
</div>

{{-- SCRIPT --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const produk = @json($products->pluck('name'));
const stok = @json($products->pluck('stock'));

new Chart(document.getElementById('stokChart'), {
    type: 'bar',
    data: {
        labels: produk,
        datasets: [{
            label: 'Stok Produk',
            data: stok,
            backgroundColor: '#ff8fb1'
        }]
    }
});

new Chart(document.getElementById('kategoriChart'), {
    type: 'pie',
    data: {
        labels: produk,
        datasets: [{
            data: stok,
            backgroundColor: [
                '#ffb6c1','#ffc0cb','#ff69b4',
                '#ffa6c9','#ff85a2','#ffd1dc'
            ]
        }]
    }
});
</script>

@endsection
