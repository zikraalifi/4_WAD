@extends('layout')

@section('content')
    <h1>Daftar Artikel</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('posts.create') }}" style="display: inline-block; margin-bottom: 20px;">Tambah Artikel</a>

    <ul style="list-style: none; padding: 0;">
        @foreach($posts as $post)
            <li style="margin-bottom: 40px; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                <h3 style="margin-top: 0;">{{ $post->title }}</h3>

                {{-- Tampilkan gambar jika ada URL --}}
                @if($post->image_url)
                    <img src="{{ $post->image_url }}" alt="Gambar Artikel" style="max-width: 100%; height: auto; margin: 15px 0; border-radius: 8px;">
                @endif

                {{-- Menampilkan konten utuh termasuk HTML-nya --}}
                <div>{!! $post->content !!}</div>

                <div style="margin-top: 15px;">
                    <a href="{{ route('posts.edit', $post->id) }}" style="margin-right: 10px;">Edit</a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus artikel?')">Hapus</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
