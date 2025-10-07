@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Pengurus</h3>

    {{-- Validasi Error --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah Pengurus --}}
    <form action="{{ route('pengurus.store') }}" method="POST">
        @csrf

        {{-- Pilih Anggota --}}
        <div class="mb-3">
            <label for="anggota_id" class="form-label">Pilih Anggota</label>
            <select name="anggota_id" id="anggota_id" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ old('anggota_id') == $a->id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Divisi --}}
        <div class="mb-3">
            <label for="divisi_id" class="form-label">Pilih Divisi</label>
            <select name="divisi_id" id="divisi_id" class="form-control" required>
                <option value="">-- Pilih Divisi --</option>
                @foreach($divisi as $d)
                    <option value="{{ $d->id }}" {{ old('divisi_id') == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_divisi }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Jabatan --}}
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" 
                   name="jabatan" 
                   id="jabatan" 
                   class="form-control" 
                   value="{{ old('jabatan') }}" 
                   required>
        </div>

        {{-- Tombol Aksi --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('pengurus.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
