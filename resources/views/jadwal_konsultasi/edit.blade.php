@extends('layouts.app') {{-- Sesuaikan dengan nama layout template Anda --}}

@php
    dd($jadwalKonsultasi); 
@endphp

@section('content')
<div class="container mt-4">
    <h2>Mengedit Jadwal Konsultasi</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- BARIS INI SUDAH BENAR: Meneruskan objek $jadwalKonsultasi secara langsung --}}
    <form action="{{ route('jadwal.update', $jadwalKonsultasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa:</label>
            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $jadwalKonsultasi->nama_mahasiswa) }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_dokter" class="form-label">Nama Dokter:</label>
            <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="{{ old('nama_dokter', $jadwalKonsultasi->nama_dokter) }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal:</label>
            {{-- Pastikan format tanggal sesuai dengan input type="date" (YYYY-MM-DD) --}}
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $jadwalKonsultasi->tanggal->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam:</label>
            {{-- Pastikan format jam sesuai dengan input type="time" (HH:MM) --}}
            <input type="time" class="form-control" id="jam" name="jam" value="{{ old('jam', \Carbon\Carbon::parse($jadwalKonsultasi->jam)->format('H:i')) }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Jadwal</button>
        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection