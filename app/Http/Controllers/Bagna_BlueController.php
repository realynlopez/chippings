<?php

namespace App\Http\Controllers;
use App\Models\blue;
use Illuminate\Http\Request;

class Bagna_BlueController extends Controller
{
    public function index()
    {

        $data = blue::all();
        return view('admin.bagna_blue', ['data' => $data]);
    }

}
