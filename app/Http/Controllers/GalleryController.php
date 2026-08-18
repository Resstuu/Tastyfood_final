<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.gallery', compact('galleries'));
    }

    public function publicIndex()
    {
        $galleries = Gallery::latest()->get();

        return view('galeri', compact('galleries'));
    }

    public function show(Gallery $gallery)
    {
        return view('galeri-detail', compact('gallery'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $validated['image_path'] = $request->file('image')->store('galleries', 'public');

        Gallery::create($validated);

        return redirect()->route('admin.gallery')->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image_path);
            $validated['image_path'] = $request->file('image')->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()->route('admin.gallery')->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('admin.gallery')->with('success', 'Foto galeri berhasil dihapus.');
    }
}
