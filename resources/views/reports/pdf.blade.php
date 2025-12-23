<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Stok Produk</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #555;
        }
        th {
            background: #f2f2f2;
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 7px;
        }
        h2 {
            text-align: center;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

<h2>LAPORAN STOK PRODUK</h2>
<p>Tanggal: {{ now()->format('d-m-Y') }}</p>

<table>
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
                    Habis
                @elseif ($product->stock <= 5)
                    Hampir Habis
                @else
                    Aman
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
