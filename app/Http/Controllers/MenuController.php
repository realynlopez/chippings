<?php 

// app/Http/Controllers/MenuController.php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all();

        return view('admin.menu.index', compact('menuItems'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        MenuItem::create($request->all());

        return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully!');
    }

    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        return view('admin.menu.edit', compact('menuItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $menuItem = MenuItem::findOrFail($id);
        $menuItem->update($request->all());

        return redirect()->route('admin.menu.index')->with('success', 'Menu item updated successfully!');
    }

    
}

