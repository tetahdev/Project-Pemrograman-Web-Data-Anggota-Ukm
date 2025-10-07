@extends('layout.app')

@section('content')
<div class="container my-4">
    <h3>Edit Pengurus</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengurus.update', $pengurus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Pilih Anggota</label>
            <select name="anggota_id" class="form-control" required>
                @foreach($anggota as $a)
                    <option value="{{ $a->id }}" {{ $a->id == $pengurus->anggota_id ? 'selected' : '' }}>
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilih Divisi</label>
            <select name="divisi_id" class="form-control" required>
                @foreach($divisi as $d)
                    <option value="{{ $d->id }}" {{ $d->id == $pengurus->divisi_id ? 'selected' : '' }}>
                        {{ $d->nama_divisi }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan', $pengurus->jabatan) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pengurus.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
