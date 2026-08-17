<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::latest()->get();

        return view('admin.news', compact('newsItems'));
    }

    public function publicIndex()
    {
        $newsItems = News::latest()->get();

        return view('berita', compact('newsItems'));
    }

    public function show(News $news)
    {
        return view('berita-detail', compact('news'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('news', 'public');
        }

        News::create($validated);

        return redirect()->route('admin.news')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function destroy(News $news)
    {
        if ($news->image_path) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()->route('admin.news')->with('success', 'Berita berhasil dihapus.');
    }
}
