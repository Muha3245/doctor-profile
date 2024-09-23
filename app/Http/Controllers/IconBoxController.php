<?php

namespace App\Http\Controllers;

use App\Models\IconBox;
use Illuminate\Http\Request;

class IconBoxController extends Controller
{
    public function index()
    {
        $iconboxes = IconBox::all();
        return view('iconboxes.index', compact('iconboxes'));
    }

    public function create()
    {
        return view('iconboxes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        IconBox::create($request->all());

        return redirect()->route('iconboxes.index')->with('success', 'Icon Box created successfully.');
    }

    public function edit(IconBox $iconbox)
    {
        return view('iconboxes.edit', compact('iconbox'));
    }

    public function update(Request $request, IconBox $iconbox)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'icon' => 'required|string',
        ]);

        $iconbox->update($request->all());

        return redirect()->route('iconboxes.index')->with('success', 'Icon Box updated successfully.');
    }

    public function destroy(IconBox $iconbox)
    {
        $iconbox->delete();
        return redirect()->route('iconboxes.index')->with('success', 'Icon Box deleted successfully.');
    }
}
