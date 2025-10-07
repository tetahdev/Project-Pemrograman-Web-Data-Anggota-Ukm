@extends('views.layout.app')

@section('content')
<div class="container my-4">
    <h3>Data Anggota</h3>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah anggota --}}
    <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">
        + Tambah Anggota
    </a>

    {{-- Tabel data anggota --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($anggota as $index => $a)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $a->nim }}</td>
                    <td>{{ $a->nama }}</td>
                    <td>{{ $a->prodi }}</td>
                    <td>{{ $a->kelas }}</td>
                    <td>{{ $a->jenis_kelamin }}</td>
                    <td>{{ $a->jabatan }}</td>
                    <td>{{ $a->divisi ? $a->divisi->nama_divisi : '-' }}</td>
                    <td>
                        @if ($a->foto)
                        <img src="{{ asset('foto/' . $a->foto) }}" 
                        alt="Foto {{ $a->nama }}" class="foto-anggota">
                        width="50" height="50" 
                        class="rounded-circle">
                        @else
                            <span class="text-muted">Belum ada</span>
                        @endif
                    </td>
                    <td>
                        {{-- Tombol Edit --}}
                        <a href="{{ route('anggota.edit', $a->id) }}" 
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('anggota.destroy', $a->id) }}" 
                              method="POST" 
                              style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">Belum ada data anggota</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
