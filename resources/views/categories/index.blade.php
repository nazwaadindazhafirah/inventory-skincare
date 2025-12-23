@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h4>Data Kategori</h4>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        + Tambah Kategori
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
            <th>Nama Kategori</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                    Edit
                </a>

                <form action="{{ route('categories.destroy', $category->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')"
                            class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
