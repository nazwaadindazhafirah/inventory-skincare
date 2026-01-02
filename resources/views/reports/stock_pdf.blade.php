<!--
Template laporan stok PDF
Diuji oleh : Lutfi Mulia
Peran : Pengujian hasil laporan & validasi output PDF
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Stok Produk</title>

    <style>
        body { font-family: Arial, sans-serif; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        table, th, td { border:1px solid black; padding:8px; font-size: 12px; }
        th { background:#f0f0f0; }
        .header { text-align:center; margin-bottom:20px; }
        .logo { width:80px; height:80px; border-radius:50%; }
    </style>
</head>
<body>

<div class="header">
    <img class="logo" src="{{ $logo }}" alt="LOGO">
    <h2>Laporan Stok Produk</h2>
    <p>{{ date('d F Y') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->stock }}</td>
            <td>
                @if($p->stock == 0)
                    Habis
                @elseif($p->stock <= 5)
                    Hampir Habis
                @else
                    Aman
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<br><br>
<p style="text-align:right; margin-top:40px;">
    <b>Admin,</b><br><br><br>
    ________________________
</p>

</body>
</html>
