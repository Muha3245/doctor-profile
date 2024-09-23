<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('abouts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        About::create([
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()->route('abouts.index')->with('success', 'About section created successfully.');
    }

    public function edit(About $about)
    {
        return view('abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $about->image = $imageName;
        }

        $about->description = $request->description;
        $about->save();

        return redirect()->route('abouts.index')->with('success', 'About section updated successfully.');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('abouts.index')->with('success', 'About section deleted successfully.');
    }
}
