<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuValidation;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::get();
        // dd($menu);
        return view('Menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuValidation $request)
    {

        $menu = Menu::create([
            'name'  => $request->name,
            'status' => $request->status
        ]);
        return redirect('menu.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('Menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->update([
            'name'  => $request->name,
            'status' => $request->status
        ]);
        return redirect('menu.
        index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->destroy;
        return redirect('index');
    }
   public function show(){
    $menus = Menu::get();
        // dd($menu);
        return view('welcome', compact('menus'));
   }
    /**
     * Toggle the status of the menu.
     */
    public function toggleStatus($id) {}
}
