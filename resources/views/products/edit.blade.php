@extends('layouts.app')

@section('content')
<h4>Edit Produk</h4>

<form action="{{ route('products.update', $product->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="name" class="form-control"
           value="{{ $product->name }}">
</div>

<div class="mb-3">
    <label>Kategori</label>
    <select name="category" class="form-control">
        <option {{ $product->category=='Skincare'?'selected':'' }}>Skincare</option>
        <option {{ $product->category=='Makeup'?'selected':'' }}>Makeup</option>
        <option {{ $product->category=='Bodycare'?'selected':'' }}>Bodycare</option>
    </select>
</div>

<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control"
           value="{{ $product->stock }}">
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>

</form>
@endsection
