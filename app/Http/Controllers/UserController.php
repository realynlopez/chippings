<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem; // MENU ITEM MODEL

class UserController extends Controller
{
    public function index()
    {
        return view('user.index'); 
    }

    public function show($id)
    {
        return view('user.show', ['userId' => $id]); 
    }

    public function getMenu()
    {
        $menuItems = MenuItem::all();

        return view('menu', compact('menuItems'));
    }
}