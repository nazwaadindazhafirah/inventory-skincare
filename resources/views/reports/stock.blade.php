@extends('layouts.app')

@section('content')

<h4 class="mb-4">Laporan Stok Produk</h4>

<!-- TOMBOL DOWNLOAD PDF -->
<a href="{{ route('report.stock.pdf') }}" 
   class="btn btn-danger mb-3" target="_blank">
    <i class="fa-solid fa-file-pdf"></i> Download PDF
</a>

<!-- TABEL -->
<div class="card mb-5">
    <div class="card-body">
        <h5 class="mb-3">Tabel Stok Produk</h5>

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
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        @if($product->stock == 0)
                            <span class="badge bg-danger">Habis</span>
                        @elseif($product->stock <= 5)
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

<!-- GRAFIK -->
<div class="row mb-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6>Grafik Status Stok</h6>
                <canvas id="pieChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h6>Grafik Jumlah Stok</h6>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- KETERANGAN -->
<div class="alert alert-info">
    <h6>Keterangan:</h6>
    <ul>
        <li><b>Hijau</b> : Stok aman (> 5)</li>
        <li><b>Kuning</b> : Stok hampir habis (1 – 5)</li>
        <li><b>Merah</b> : Stok habis (0)</li>
    </ul>

    <p>
        Grafik digunakan untuk membantu admin memantau kondisi stok produk
        sehingga keputusan restock dapat dibuat lebih cepat dan tepat.
    </p>
</div>

<!-- SCRIPT GRAFIK -->
<script>
const pie = document.getElementById('pieChart');
new Chart(pie, {
    type: 'pie',
    data: {
        labels: ['Aman', 'Hampir Habis', 'Habis'],
        datasets: [{
            data: [{{ $aman }}, {{ $hampir }}, {{ $habis }}]
        }]
    }
});

const bar = document.getElementById('barChart');
new Chart(bar, {
    type: 'bar',
    data: {
        labels: ['Aman', 'Hampir Habis', 'Habis'],
        datasets: [{
            label: 'Jumlah Produk',
            data: [{{ $aman }}, {{ $hampir }}, {{ $habis }}]
        }]
    }
});
</script>

@endsection
