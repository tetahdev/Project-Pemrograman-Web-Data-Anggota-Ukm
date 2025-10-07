@extends('layout.app')

@section('content')
<div class="container my-4">
    <h3>Tambah Divisi</h3>

    <form action="{{ route('divisi.store') }}" method="POST">
        @csrf

        {{-- Nama Divisi --}}
        <div class="mb-3">
            <label for="nama_divisi" class="form-label">Nama Divisi</label>
            <input type="text" 
                   name="nama_divisi" 
                   id="nama_divisi" 
                   class="form-control" 
                   required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      class="form-control" 
                      rows="3" 
                      required></textarea>
        </div>

        {{-- Tombol Aksi --}}
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
