<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
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
            'description' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
                $file->move(public_path('galleries'), $filename);
                $images[] = $filename; // Store each filename in the array
            }
        }

        Gallery::create([
            'description' => $request->description,
            'image' => json_encode($images), // Encode images as JSON
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $images = json_decode($gallery->image, true) ?? [];

        // Update existing images if any
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = date('YmdHi') . '_' . $file->getClientOriginalName();
                $file->move(public_path('galleries'), $filename);
                $images[] = $filename; // Store each filename in the array
            }
        }

        $gallery->update([
            'description' => $request->description,
            'image' => json_encode($images), // Encode images as JSON
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            $images = json_decode($gallery->image, true);
            foreach ($images as $image) {
                $filePath = public_path('galleries/' . $image);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully.');
    }

    public function destroyImage($galleryId, $index = null)
    {
        $gallery = Gallery::findOrFail($galleryId);

        // Decode the existing images
        $images = json_decode($gallery->image, true);

        // Check if the index is valid
        if (isset($images[$index])) {
            // Construct the file path
            $filePath = public_path('galleries/' . $images[$index]);

            // Delete the image file from storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Remove the image from the array
            unset($images[$index]);

            // Re-index the array
            $images = array_values($images);

            // Update the gallery record
            $gallery->update(['image' => json_encode($images)]);

            return redirect()->back()->with('success', 'Image deleted successfully.');
        }

        return redirect()->back()->with('error', 'Image not found.');
    }
}
