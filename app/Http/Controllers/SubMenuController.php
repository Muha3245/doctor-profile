<?php
namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the submenus for a specific menu.
     */
    public function index(Request $request)
    {
        $sub=SubMenu::with('menu')->get();
        // dd($sub);
                return view('SubMenu.index',compact('sub'));

    }

    /**
     * Show the form for creating a new submenu for a specific menu.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created submenu in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified submenu.
     */
    public function edit($menu_id, SubMenu $submenu)
    {

    }

    /**
     * Update the specified submenu in storage.
     */
    public function update(Request $request, SubMenu $submenu)
    {
    }

    /**
     * Remove the specified submenu from storage.
     */
    public function destroy(SubMenu $submenu)
    {

    }

    /**
     * Toggle the status of the specified submenu.
     */
    public function toggleStatus($id)
    {

    }
}
