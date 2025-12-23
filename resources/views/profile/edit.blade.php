@extends('layouts.app')

@section('content')

<h4 class="mb-4">Pengaturan Profil</h4>

<div class="card shadow-sm" style="max-width: 600px;">
    <div class="card-body">

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            {{-- NAMA --}}
            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" 
                       class="form-control" 
                       value="{{ old('name', auth()->user()->name) }}" required>
            </div>

            {{-- EMAIL --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" 
                       class="form-control" 
                       value="{{ old('email', auth()->user()->email) }}" required>
            </div>

            <button type="submit" class="btn btn-pink px-4">
                Simpan Perubahan
            </button>
        </form>

        <hr class="my-4">

        {{-- HAPUS AKUN --}}
        <h6 class="text-danger">Hapus Akun</h6>
        <p class="text-muted" style="font-size: 14px;">
            Menghapus akun akan menghilangkan semua data terkait. Aksi ini tidak dapat dibatalkan.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Yakin ingin menghapus akun?')">
                Hapus Akun
            </button>
        </form>
    </div>
</div>

@endsection
