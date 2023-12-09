<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{  
    public function index()
    {
        $dailySales = [];
        $monthlySales = [];
        $yearlySales =[];
        
        $data = [
            'dailySales' => $dailySales,
            'monthlySales' => $monthlySales,
            'yearlySales' => $yearlySales,
        ];
        
        return view('sales.index', $data);

    }
}

