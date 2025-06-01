@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Obat</h1>

    <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_obat" class="block text-sm font-medium text-gray-700">Nama Obat:</label>
            <input type="text" name="nama_obat" id="nama_obat"
                value="{{ old('nama_obat', $medicine->nama_obat) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis:</label>
            <input type="text" name="jenis" id="jenis"
                value="{{ old('jenis', $medicine->jenis) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
            <input type="number" name="stok" id="stok"
                value="{{ old('stok', $medicine->stok) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <label for="expired_date" class="block text-sm font-medium text-gray-700">Expired Date:</label>
            <input type="date" name="expired_date" id="expired_date"
                value="{{ old('expired_date', $medicine->expired_date) }}"
                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"
                required>
        </div>

        <div>
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 font-semibold">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
