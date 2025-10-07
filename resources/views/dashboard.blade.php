<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota | Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
            display: flex;
        }
        .foto-anggota {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    @include('layout.header')

    <div class="main-content">
        <!-- Sidebar -->
        @include('layout.sidebar')

        <!-- Konten Utama -->
        <div class="p-4 flex-grow-1">
            <h3>Data Anggota</h3>

            <div class="mb-3">
                <a href="{{ route('anggota.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Anggota
                </a>
            </div>
            
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
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggota as $index => $agt)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $agt->nim }}</td>
                            <td>{{ $agt->nama }}</td>
                            <td>{{ $agt->prodi }}</td>
                            <td>{{ $agt->kelas }}</td> <!-- kelas -->
                            <td>{{ $agt->jenis_kelamin }}</td> <!-- jenis kelamin -->
                            <td>{{ $agt->jabatan ?? '-' }}</td>
                            <td>
                                @if($agt->foto)
                                    <img src="{{ asset('foto/'.$agt->foto) }}" 
                                         alt="Foto {{ $agt->nama }}" 
                                         class="foto-anggota">
                                @else
                                    <span class="text-muted">Belum ada</span>
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('anggota.edit', $agt->id) }}" 
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <!-- Tombol Delete -->
                                <form action="{{ route('anggota.destroy', $agt->id) }}" 
                                      method="POST" 
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Yakin mau hapus data ini?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">Belum ada data anggota</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    @include('layout.footer')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
