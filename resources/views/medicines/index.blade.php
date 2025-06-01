<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Halaman Daftar Obat</h1>

        <a href="{{ route('medicines.create') }}" class="btn btn-primary mb-3">Tambah Obat Baru</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($medicines->isEmpty())
            <p>Tidak ada data obat yang tersedia.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Obat</th>
                        <th>Jenis</th>       
                        <th>Stok</th>        
                        <th>Expired Date</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicines as $medicine)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $medicine->nama_obat }}</td>
                        <td>{{ $medicine->jenis }}</td>
                        <td>{{ $medicine->stok }}</td>
                        <td>{{ $medicine->expired_date }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Aksi Obat">
                        <a href="{{ route('medicines.show', $medicine->id) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('medicines.edit', $medicine->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST"
              onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat ini?')" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</td>
</tr>
@endforeach
                </tbody>
            </table>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>