@extends('layout.app')

@section('content')
<div class="container my-4">
    <h3>Daftar Pengurus</h3>
    <a href="{{ route('pengurus.create') }}" class="btn btn-primary mb-3">Tambah Pengurus</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Anggota</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengurus as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->anggota->nama ?? '-' }}</td>
                    <td>{{ $p->divisi->nama_divisi ?? '-' }}</td>
                    <td>{{ $p->jabatan }}</td>
                    <td>
                        <a href="{{ route('pengurus.edit',$p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengurus.destroy',$p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada data pengurus</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
