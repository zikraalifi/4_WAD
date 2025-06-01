@extends('layout')

@section('content')
    <h1>Tambah Post Baru</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="title" value="{{ old('title') }}"><br><br>

        <label>Konten:</label><br>
        <textarea name="content">{{ old('content') }}</textarea><br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('posts.index') }}">Batal</a>
    </form>
@endsection
