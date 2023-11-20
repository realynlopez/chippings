<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User; 


class AdminController extends Controller
{    
    public function admindashboard()
    {
        // You can add any additional logic or data retrieval here
        $data = [
            'pageTitle' => 'Admin Dashboard',
            'welcomeMessage' => 'Welcome to the Admin Dashboard!',
            // Add more data as needed
        ];

        return view('admin.admin-dashboard');
    }

    public function adminpost(Request $request)
    {
        // Process the data from the POST request
        // You can add your logic for handling form submissions, updating data, etc.
        // Example: $requestData = $request->all();

        // Redirect back to the admin dashboard after processing
        return redirect()->route('admin.admin.dashboard');
    }

    /*public function showAdmins()
    {
        $firstAdmin = User::first();
        $allAdmins = User::all();

        if ($firstAdmin) {
            return view('admin.admin-dashboard', compact('firstAdmin', 'allAdmins'));
        } else {
            // Handle the case where $firstAdmin is null, perhaps by redirecting or displaying an error
            return redirect()->route('admin.dashboard')->with('error', 'No admin found.');
        }
        return view('admin.admin-dashboard', compact('firstAdmin', 'allAdmins'));
    }*/

    /*public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }*/

}


