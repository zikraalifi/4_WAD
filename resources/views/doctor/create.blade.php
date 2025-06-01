@extends('layouts.app')

@section('title', 'Tambah Dokter')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tambah Dokter</h2>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('doctors.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Pilih User:</label>
                <select name="user_id" id="user_id" class="form-select" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Dokter:</label>
                <input type="text" name="name" id="name" class="form-control" 
                       value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="specialization" class="form-label">Spesialisasi:</label>
                <input type="text" name="specialization" id="specialization" 
                       class="form-control" value="{{ old('specialization') }}" required>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection