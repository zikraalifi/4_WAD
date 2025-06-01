<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Form Tambah Obat Baru</h1>

        {{-- Menampilkan pesan error validasi (jika ada) --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('medicines.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat:</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}" required>
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Obat:</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ old('stok') }}" required min="0">
            </div>

            <div class="mb-3">
                <label for="expired_date" class="form-label">Tanggal Kadaluarsa:</label>
                <input type="date" class="form-control" id="expired_date" name="expired_date" value="{{ old('expired_date') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan Obat</button>
            <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>