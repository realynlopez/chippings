<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\Queue;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch available tables
            $availableTables = Table::whereDoesntHave('reservations')->get();

            // Fetch user's reservations for waiting queue information
            $userReservations = Reservation::where('user_id', auth()->user()->id)->get();

            return view('user.dashboard', compact('availableTables', 'userReservations'));
        } else {
            // Redirect to the login page or handle the case where the user is not authenticated
            return redirect()->route('login');
        }
    }

    public function showQueueStatus()
    {
        // Retrieve queue information
        $queue = Queue::all(); // Adjust the query based on your queue structure and logic

        // You might also calculate estimated wait time based on your business logic

        return view('user.queue_status', compact('queue'));
    }
}

