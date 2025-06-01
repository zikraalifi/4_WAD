@extends('layouts.app')

@section('title', 'Daftar Dokter')

@section('content')
    <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{ route('dashboard') }}" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #2196F3; color: white; border: none; cursor: pointer; text-decoration: none; transition: background-color 0.3s ease;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" style="vertical-align: middle; margin-right: 5px;" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
            </svg>
            Kembali ke Dashboard
        </a>
        
        <form action="{{ route('doctors.create') }}" method="get" style="display:inline;">
            <button type="submit" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #4caf50; color: white; border: none; cursor: pointer; text-decoration: none; transition: background-color 0.3s ease;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" style="vertical-align: middle;" viewBox="0 0 16 16">
                    <path d="M8 1a.5.5 0 01.5.5v6h6a.5.5 0 010 1h-6v6a.5.5 0 01-1 0v-6h-6a.5.5 0 010-1h6v-6A.5.5 0 018 1z"/>
                </svg>
                <span style="margin-left: 5px;">Tambah Dokter</span>
            </button>
        </form>
    </div>

    <h2>Daftar Dokter</h2>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="padding: 12px;">No</th>
                <th style="padding: 12px;">Nama</th>
                <th style="padding: 12px;">Spesialisasi</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($doctors as $doctor)
            <tr style="background-color: #fff; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px;">{{ $loop->iteration }}</td>
                <td style="padding: 12px;">{{ $doctor->name }}</td>
                <td style="padding: 12px;">{{ $doctor->specialization }}</td>
                <td style="padding: 12px;">
                    <a href="{{ route('doctors.edit', $doctor->id) }}" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #ffa500; color: white;">Edit</a>
                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')" style="padding: 8px 16px; font-size: 14px; border-radius: 5px; background-color: #f44336; color: white;">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection