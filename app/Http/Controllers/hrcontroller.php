<?php

namespace App\Http\Controllers;
use App\Models\hrmodel;

use Illuminate\Http\Request;

class hrcontroller extends Controller
{
    public function index()
    {
        return view('hr');
    }
}
