@extends('layouts.app')

@section('content')
<h4>Tambah Kategori</h4>

<form action="{{ route('categories.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="name" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
