<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SalesController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function getData(Request $request)
    {
        $amount = $request->input('amount');

        // You can store $amount in the database or perform any other necessary actions.

        return response()->json(['success' => true]);
    }
}
