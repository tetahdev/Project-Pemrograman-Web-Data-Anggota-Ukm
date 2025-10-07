@extends('layout.app')

@section('content')
<div class="container my-4">
    <h3>Data Divisi</h3>

    <a href="{{ route('divisi.create') }}" class="btn btn-primary mb-3">
        + Tambah Divisi
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Divisi</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($divisi as $index => $d)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $d->nama_divisi }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('divisi.edit', $d->id) }}" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('divisi.destroy', $d->id) }}" 
                              method="POST" 
                              style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus divisi ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
