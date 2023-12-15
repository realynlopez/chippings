<?php
namespace App\Http\Controllers;


use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function getSalesChartData()
    {
        $sales = DB::table('transactions')->get(); // Assuming "transactions" is your table name

        $labels = [];
        $amounts = [];
        $descriptions = [];

        foreach ($sales as $sale) {
            $labels[] = $sale->id; // Use the appropriate field for the label
            $amounts[] = $sale->amount; // Use the appropriate field for the amount
            $descriptions[] = $sale->description; // Use the appropriate field for the description
        }

        return response()->json([
            'success' => true,
            'labels' => $labels,
            'amounts' => $amounts,
            'descriptions' => $descriptions,
        ]);
    }
}