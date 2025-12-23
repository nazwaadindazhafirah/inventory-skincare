@extends('layouts.app')

@section('content')
<h4>Edit Kategori</h4>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Nama Kategori</label>
    <input type="text" name="name" class="form-control"
           value="{{ $category->name }}">
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
