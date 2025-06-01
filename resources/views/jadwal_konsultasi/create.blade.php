@extends('layouts.app')

@section('content')
<div class="container form-container">
    <div class="form-header">
        <h2 class="form-title">Tambah Jadwal Konsultasi Baru</h2>
        <a href="{{ route('jadwal.index') }}" class="btn btn-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <div class="alert-icon">
                <i class="bi bi-exclamation-circle"></i>
            </div>
            <div>
                <h4 class="alert-title">Ada kesalahan!</h4>
                <ul class="alert-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form action="{{ route('jadwal.store') }}" method="POST" class="consultation-form">
        @csrf
        <div class="form-group">
            <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-input" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" required>
        </div>
        <div class="form-group">
            <label for="nama_dokter" class="form-label">Nama Dokter</label>
            <input type="text" class="form-input" id="nama_dokter" name="nama_dokter" value="{{ old('nama_dokter') }}" required>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-input" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
            </div>
            <div class="form-group">
                <label for="jam" class="form-label">Jam</label>
                <input type="time" class="form-input" id="jam" name="jam" value="{{ old('jam') }}" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-submit">
                <i class="bi bi-calendar-check"></i> Simpan Jadwal
            </button>
        </div>
    </form>
</div>

<style>
    /* Base Container */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Header Styles */
    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .form-title {
        font-size: 1.5rem;
        color: #2c3e50;
        margin: 0;
    }

    /* Alert Styles */
    .alert-error {
        background-color: #fef2f2;
        border-left: 4px solid #ef4444;
        padding: 16px;
        margin-bottom: 25px;
        display: flex;
        gap: 12px;
        border-radius: 4px;
    }

    .alert-icon {
        color: #ef4444;
        font-size: 1.25rem;
    }

    .alert-title {
        font-size: 1rem;
        color: #b91c1c;
        margin: 0 0 8px 0;
    }

    .alert-list {
        margin: 0;
        padding-left: 20px;
        color: #7f1d1d;
    }

    /* Form Styles */
    .consultation-form {
        background-color: white;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #374151;
    }

    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 0.9375rem;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Button Styles */
    .btn {
        padding: 10px 16px;
        border-radius: 6px;
        font-size: 0.9375rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.2s;
        border: none;
    }

    .btn-back {
        background-color: #f3f4f6;
        color: #374151;
    }

    .btn-back:hover {
        background-color: #e5e7eb;
    }

    .btn-submit {
        background-color: #10b981;
        color: white;
    }

    .btn-submit:hover {
        background-color: #059669;
    }

    .form-actions {
        margin-top: 30px;
        display: flex;
        justify-content: flex-end;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 20px;
        }
        
        .form-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .form-actions {
            justify-content: center;
        }
        
        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection