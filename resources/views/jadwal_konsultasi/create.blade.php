@extends('layouts.app') {{-- Sesuaikan dengan nama layout template Anda --}}

@section('content')
<div class="container mt-4">
    <h2>Tambah Jadwal Konsultasi Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwal.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa:</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter:</label>
            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="{{ old('nama_dokter') }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal:</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam:</label>
            <input type="time" class="form-control" id="jam" name="jam" value="{{ old('jam') }}" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Jadwal</button>
        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection