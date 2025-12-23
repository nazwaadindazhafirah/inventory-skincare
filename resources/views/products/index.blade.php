@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Produk</h4>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        + Tambah Produk
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
