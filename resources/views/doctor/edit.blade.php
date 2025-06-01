@extends('layouts.app')

@section('title', 'Edit Dokter')

@section('content')
    <h2>Edit Data Dokter</h2>

    <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="user_id">Pilih User:</label>
            <select name="user_id" id="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $doctor->user_id ? 'selected' : '' }}>
                        {{ $user->name }} - {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="name">Nama Dokter:</label>
            <input type="text" name="name" id="name" value="{{ $doctor->name }}" required>
        </div>

        <div>
            <label for="specialization">Spesialisasi:</label>
            <input type="text" name="specialization" id="specialization" value="{{ $doctor->specialization }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
