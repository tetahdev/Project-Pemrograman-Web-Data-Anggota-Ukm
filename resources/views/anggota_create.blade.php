@extends('layout.app')

@section('content')
<div class="container">
    <h3>Tambah Data Anggota</h3>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" value="{{ old('nim') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <input type="text" class="form-control" name="prodi" value="{{ old('prodi') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Divisi</label>
            <select class="form-select" name="divisi_id">
                <option value="">-- Pilih Divisi --</option>
                @foreach($divisi as $d)
                    <option value="{{ $d->id }}" {{ old('divisi_id') == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_divisi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
