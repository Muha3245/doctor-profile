<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class Navcontroller extends Controller
{
    public function index()
{
    $menues = Menu::with(['submenu' => function ($query) {
        $query->where('status', true); 
    }])->where('status', true)->get(); 

    return view('welcome', compact('menues'));
}
}
