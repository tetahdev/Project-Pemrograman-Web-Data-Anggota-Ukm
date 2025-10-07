@extends('layout.app')

@section('content')
<div class="container">
    <h3>Edit Data Anggota</h3>

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

    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" 
                value="{{ old('nim', $anggota->nim) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" 
                value="{{ old('nama', $anggota->nama) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <input type="text" name="prodi" class="form-control" 
                value="{{ old('prodi', $anggota->prodi) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <input type="text" name="kelas" class="form-control" 
                value="{{ old('kelas', $anggota->kelas) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select" required>
                <option value="L" {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin', $anggota->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" 
                value="{{ old('jabatan', $anggota->jabatan) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Divisi</label>
            <select name="divisi_id" class="form-select">
                <option value="">-- Pilih Divisi --</option>
                @foreach ($divisi as $d)
                    <option value="{{ $d->id }}" {{ $anggota->divisi_id == $d->id ? 'selected' : '' }}>
                        {{ $d->nama_divisi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label><br>
            @if ($anggota->foto)
                <img src="{{ asset('foto/' . $anggota->foto) }}" width="80" class="mb-2">
            @else
                <p class="text-muted">Belum ada foto</p>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
