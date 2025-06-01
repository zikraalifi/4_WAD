@extends('layouts.app') {{-- Sesuaikan dengan nama layout template Anda --}}

@section('content')
<div class="container mt-4">
    <h2>Daftar Jadwal Konsultasi</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">Tambah Jadwal Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Nama Dokter</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($jadwalKonsultasis as $jadwal)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jadwal->nama_mahasiswa }}</td>
                    <td>{{ $jadwal->nama_dokter }}</td>
                    <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}</td>
                    <td>
                        <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan jadwal ini?')">Batalkan</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada jadwal konsultasi yang tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection