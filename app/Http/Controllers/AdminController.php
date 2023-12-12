<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Queue;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;


class AdminController extends Controller
{    
    public function adminDashboard()
    {
        // You can add any additional logic or data retrieval here
        $data = [
            'pageTitle' => 'Admin Dashboard',
            'welcomeMessage' => 'Welcome to the Admin Dashboard!',
            // Add more data as needed
        ];
        return view('admin.admin-dashboard', $data); 
    }

    public function getNewUsers()
    {
        $newUsers = User::getNewUsers();
        return view('admin.new_users', compact('newUsers'));
    }
    
    // Inside your controller
    public function adminNewUsers()
    {
        return view('admin.new_users');
    }



    public function adminPost(Request $request)
    {
        // Process the data from the POST request
        // You can add your logic for handling form submissions, updating data, etc.
        // Example: $requestData = $request->all();

        // Redirect back to the admin dashboard after processing
        return redirect()->route('admin.admin.dashboard');
    }

    public function laludBranch(Request $request)
    {
        // Retrieve the selected timeframe from the request
        $timeframe = $request->input('timeframe', 'daily'); // Default to daily if not specified

        // Retrieve transactions based on the selected timeframe
        $transactions = $this->getTransactionsByTimeframe($timeframe);

        // Pass the transactions, timeframe, and a flag indicating the selected timeframe to the view
        return view('admin.laludBranch', compact('transactions', 'timeframe'));
    }

    private function getTransactionsByTimeframe($timeframe)
    {
        $startDate = now()->subDays(5); // Default to the last 5 days

        if ($timeframe === 'monthly') {
            $startDate = now()->subMonths(5);
        } elseif ($timeframe === 'yearly') {
            $startDate = now()->subYears(5);
        }

        $transactions = Transaction::whereDate('transaction_date', '>=', $startDate)
            ->where(function ($query) {
                $query->whereDate('transaction_date', '!=', '0000-00-00') // or another invalid date
                    ->orWhereNull('transaction_date');
            })
            ->get();

        // Ensure transaction_date is cast to Carbon for correct formatting in the view
        $transactions = $transactions->map(function ($transaction) {
            $transaction->transaction_date = Carbon::parse($transaction->transaction_date);
            return $transaction;
        });

        return $transactions;
    }

    public function addTransaction(Request $request)
    {
        // Validate the request data (adjust rules as needed)
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'transaction_date' => 'required|date',
        ]);

        // Create a new transaction
        Transaction::create($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Transaction added successfully.');
    }



    public function nacocoBranch(Request $request)
    {
        // Retrieve the selected timeframe from the request
        $timeframe = $request->input('timeframe', 'daily'); // Default to daily if not specified

        // Retrieve transactions based on the selected timeframe
        $transactions = $this->getTransactionsByTimeframe($timeframe);

        // Pass the transactions, timeframe, and a flag indicating the selected timeframe to the view
        return view('admin.nacocoBranch', compact('transactions', 'timeframe'));
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
