@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">
    <h1 class="text-2xl font-bold mb-4">Detail Obat</h1>

    <ul class="space-y-2 text-gray-700">
        <li><strong>Nama Obat:</strong> {{ $medicine->nama_obat }}</li>
        <li><strong>Jenis:</strong> {{ $medicine->jenis }}</li>
        <li><strong>Stok:</strong> {{ $medicine->stok }}</li>
        <li><strong>Expired Date:</strong> {{ $medicine->expired_date }}</li>
    </ul>

    <div class="mt-6">
        <a href="{{ route('medicines.index') }}" class="text-blue-600 hover:underline">← Kembali ke daftar obat</a>
    </div>
</div>
@endsection
