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
        // Fetch available tables
        $availableTables = Table::whereDoesntHave('reservations')->get();

        // Commenting out the authentication check for testing purposes
        // Fetch user's reservations for waiting queue information
        // $userReservations = auth()->check() ? Reservation::where('user_id', auth()->user()->id)->get() : null;
        $userReservations = null; // Set $userReservations to null for testing

        return view('user.dashboard', [
            'availableTables' => $availableTables,
            'userReservations' => $userReservations,
        ]);
    }
    public function showQueueStatus()
    {
        // Retrieve queue information
        $queue = Queue::all(); // Adjust the query based on your queue structure and logic

        // You might also calculate estimated wait time based on your business logic

        return view('user.queue_status', compact('queue'));
    }

    public function showBookingForm()
    {
        // Get current date and time
        $dateTime = now();

        // Example number of guests; adjust this based on your requirements
        $numberOfGuests = 2;

        // Retrieve all tables
        $availableTables = Table::available()->get();

        // Filter available tables using isAvailable method
        $availableTables = $availableTables->filter(function ($table) use ($dateTime, $numberOfGuests) {
            return $table->isAvailable($dateTime, $numberOfGuests);
        });

        return view('reservation.book_table', compact('availableTables'));
    }


    
}

