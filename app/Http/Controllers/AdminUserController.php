<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function newlyRegisteredUsers()
    {
        $newUsers = User::latest()->take(10)->get(); // Change 10 to the number of users you want to retrieve
        return view('admin.new-registered-users', compact('newUsers'));
    }
}
