@extends('layout.app')

@section('content')
<div class="container my-4">
    <h3>Edit Divisi</h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('divisi.update', $divisi->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama Divisi --}}
        <div class="mb-3">
            <label for="nama_divisi" class="form-label">Nama Divisi</label>
            <input type="text" 
                   name="nama_divisi" 
                   id="nama_divisi" 
                   class="form-control" 
                   value="{{ old('nama_divisi', $divisi->nama_divisi) }}" 
                   required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      class="form-control" 
                      rows="3" 
                      required>{{ old('deskripsi', $divisi->deskripsi) }}</textarea>
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('divisi.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
