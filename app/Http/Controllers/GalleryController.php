<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
        ]);

        // ✅ Store the file and get the filename only
        $path = $request->file('image')->store('images', 'public'); // saves to: storage/app/public/images/filename.png
        $filename = basename($path);

        Gallery::create([
            'title' => $request->title,
            'image' => $filename, // only store the filename
        ]);

        return redirect()->route('gallery.index');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = ['title' => $request->title];

        if ($request->hasFile('image')) {
            Storage::delete('public/images/' . $gallery->image);
            $image = $request->file('image')->store('images', 'public');
            $data['image'] = basename($image);
        }

        $gallery->update($data);

        return redirect()->route('gallery.index');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::delete('public/images/' . $gallery->image);
        $gallery->delete();
        return redirect()->route('gallery.index');
    }
}
