<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

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

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted successfully!');
    }

    // Menu COntroller FOr user

    public function userIndex()
    {
        $menuItems = MenuItem::all();

        return view('user.menu', compact('menuItems'));
    }

    public function userShow($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        return view('user.menu', compact('menuItem'));
    }

}


