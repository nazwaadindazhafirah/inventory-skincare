@extends('layouts.app')

@section('content')
<h4>Tambah Produk</h4>

<form action="{{ route('products.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
    <label>Kategori</label>
    <select name="category" class="form-control">
        <option>Skincare</option>
        <option>Makeup</option>
        <option>Bodycare</option>
    </select>
</div>

<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>

</form>
@endsection
