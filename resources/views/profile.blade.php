@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profil Pengguna</h2>

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        </div>
    </div>
</div>
@endsection
