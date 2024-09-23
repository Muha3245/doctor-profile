<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        // dd($doctors);
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('doctors'), $filename);
            $data['image']= $filename;
        }
        Doctor::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully');
    }

    public function edit($id)
    {
        $doctor= Doctor::find($id);

        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);
        $doctor=Doctor::find($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($doctor->image);
            $imagePath = $request->file('image')->store('doctor', 'public');
            $doctor->update(['image' => $imagePath]);
        }

        $doctor->update($request->except('image'));

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        $doctor=Doctor::find($id);
        Storage::disk('public')->delete($doctor->image);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
