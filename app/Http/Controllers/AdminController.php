<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User; 
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator; 
use App\Models\Product;
use App\Models\Queue;


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

    public function laludBranch()
    {
        return view('admin.laludBranch');
    }

    public function laludBranchWithData()
    {
        // Retrieve daily transactions
        $dailyTransactions = Transaction::whereDate('transaction_date', '>=', now()->subDays(5))->get();
    
        // Check if there are any daily transactions
        if ($dailyTransactions->isEmpty()) {
            // If there are no transactions, you might want to handle this case.
            // For now, you can set $dailyTransactions to an empty array.
            $dailyTransactions = [];
        }
    
        // Retrieve monthly and yearly transactions
        $monthlyTransactions = Transaction::whereDate('transaction_date', '>=', now()->subMonths(5))->get();
        $yearlyTransactions = Transaction::whereDate('transaction_date', '>=', now()->subYears(5))->get();
    
        // Pass the transactions to the view
        return view('admin.laludBranch', compact('dailyTransactions', 'monthlyTransactions', 'yearlyTransactions'));
    }
    


    public function NacocoBranch()
    {
        return view('admin.NacocoBranch');
    }

    public function nacocoBranchWithData()
    {
        // Retrieve data for daily, monthly, and yearly transactions
        $dailyTransactions = Transaction::whereDate('transaction_date', '>=', now()->subDays(5))->get();
        $monthlyTransactions = Transaction::whereDate('transaction_date', '>=', now()->subMonths(5))->get();
        $yearlyTransactions = Transaction::whereDate('transaction_date', '>=', now()->subYears(5))->get();

        // Pass the data to the view
        return view('admin.nacocoBranch', compact('dailyTransactions', 'monthlyTransactions', 'yearlyTransactions'));
    }

    public function showProduct($id)
    {
        $product = Product::findOrFail($id);

        // You can customize this view or redirect logic based on your requirements
        return view('admin.show-product', compact('product'));
    }
    

    

    /*public function queue()
    {
        // Fetch dynamic queue data (replace with your actual logic)
        $queue = Queue::all();

        return view('admin.queue', compact('queue'));
    }*/



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




