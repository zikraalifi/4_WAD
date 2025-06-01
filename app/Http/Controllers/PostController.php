<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Tampilkan semua post terbaru
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Tampilkan form tambah post baru
    public function create()
    {
        return view('posts.create');
    }

    // Simpan post baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->only('title', 'category', 'content'));

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Tampilkan detail post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Tampilkan form edit post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Update data post
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'content' => 'required|string',
        ]);

        $post->update($request->only('title', 'category', 'content'));

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil diupdate!');
    }

    // Hapus post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
