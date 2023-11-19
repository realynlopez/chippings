<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index()
    {
        // Your code here
    }

    public function dashboard()
    {
        // Assuming you have an authenticated admin user
        $admin = auth()->user();

        // You can fetch additional data from the database if needed
        // For example, get a list of all admins
        $allAdmins = Admin::all();

        // Return the admin dashboard view with data
        return view('admin.dashboard', compact('admin', 'allAdmins'));
    }
}
