@extends('layout')

@section('content')
    <h1>Edit Artikel</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul:</label><br>
        <input type="text" name="title" value="{{ old('title', $post->title) }}"><br><br>

        <label>Konten:</label><br>
        <textarea name="content">{{ old('content', $post->content) }}</textarea><br><br>

        <button type="submit">Update</button>
        <a href="{{ route('posts.index') }}">Batal</a>
    </form>
@endsection
