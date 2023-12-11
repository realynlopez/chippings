<?php
// app/Http/Controllers/AdminTableController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table; 
use App\Events\TableUpdated;

class AdminTableController extends Controller
{
    public function showTableManagementForm()
    {
        $tables = Table::all(); // Retrieve all tables from the database

        return view('admin.table_management', compact('tables'));
    }

    public function addTable(Request $request)
    {
        // Validate the request
        $request->validate([
            'table_name' => 'required|string|max:255',
            // Add more validation rules for other fields as needed
        ]);

        // Create a new table in the database
        $table = new Table();
        $table->table_name = $request->input('table_name');
        // Set other properties as needed
        $table->status = 'available'; // Set the default status
        $table->save();

        return redirect()->route('admin.table.management')->with('success', 'Table added successfully!');
    }

    public function markTableOccupied(Request $request, $id)
    {
        $table = Table::find($id);

        if ($table) {
            $table->status = 'occupied';
            $table->save();

            // Broadcast the table status change
            broadcast(new TableUpdated($table->id, false)); // Assuming false means the table is not available

            return redirect()->route('admin.table.management')->with('success', 'Table marked as occupied successfully!');
        }

        return redirect()->route('admin.table.management')->with('error', 'Table not found!');
    }

}
