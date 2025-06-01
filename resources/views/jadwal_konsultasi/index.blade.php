@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="schedule-header">
        <h2 class="schedule-title">Daftar Jadwal</h2>
        <a href="{{ route('jadwal.create') }}" class="btn btn-add">
            <i class="bi bi-plus"></i> Tambah Jadwal Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-simple">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table class="schedule-table">
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
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->nama_mahasiswa }}</td>
                        <td>{{ $jadwal->nama_dokter }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d-m-Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-edit">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-cancel" onclick="return confirm('Apakah Anda yakin ingin membatalkan jadwal ini?')">
                                    <i class="bi bi-x-circle"></i> Batalkan
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center no-data">
                            <i class="bi bi-calendar-x"></i> Tidak ada jadwal konsultasi yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Base Styles */
    .container {
        max-width: 1200px;
        padding: 0 15px;
    }

    /* Header Styles */
    .schedule-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .schedule-title {
        font-size: 1.5rem;
        color: #2c3e50;
        margin: 0;
    }

    /* Alert Styles */
    .alert-simple {
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Button Styles */
    .btn {
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.2s ease;
    }

    .btn-add {
        background-color: #3490dc;
        color: white;
        border: none;
    }

    .btn-add:hover {
        background-color: #2779bd;
        transform: translateY(-1px);
    }

    .btn-edit {
        background-color: #f39c12;
        color: white;
        border: none;
    }

    .btn-cancel {
        background-color: #e74c3c;
        color: white;
        border: none;
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .schedule-table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }

    .schedule-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }

    .schedule-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .schedule-table tr:hover {
        background-color: #f8f9fa;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    /* No Data Message */
    .no-data {
        padding: 20px;
        color: #6c757d;
        font-size: 0.9375rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .schedule-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .schedule-table th, 
        .schedule-table td {
            padding: 8px 10px;
            font-size: 0.8125rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection