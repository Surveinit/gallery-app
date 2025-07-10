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

    public function create(){
        return view('gallery.create');
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'image'=>'required|image',
        ]);

        $image = $request->file('image')->store('public/images');
        $imageName = basename($image);

        Gallery::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route('gallery.index');
    }
}
