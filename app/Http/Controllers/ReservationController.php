<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Events\TableUpdated;
use App\Models\Queue;


class ReservationController extends Controller
{
    // app/Http/Controllers/ReservationController.php

    public function showAvailableTables()
    {
        $tables = Table::whereDoesntHave('reservations', function ($query) {
            // Check for available tables based on reservations
        })->get();

        return view('reservation.available_tables', compact('tables'));
    }



    
    public function reserveTable(Request $request)
    {
        // Validate the request
        $request->validate([
            'reservation_date_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'table_id' => 'required', // Add validation for the table_id
        ]);

        // Create a reservation
        Reservation::create([
            'user_id' => auth()->user()->id,
            'table_id' => $request->input('table_id'),
            'reservation_date_time' => $request->input('reservation_date_time'),
            'number_of_guests' => $request->input('number_of_guests'),
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Table reserved successfully!');
    }


    public function joinQueue(Request $request)
    {
        // Validate the request
        $request->validate([
            'table_id' => 'required|exists:tables,id',
        ]);

        // Check if the user is already in the queue
        $existingQueue = Queue::where('user_id', auth()->user()->id)->first();

        if ($existingQueue) {
            return redirect()->route('available.tables')->with('error', 'You are already in the queue.');
        }

        // Add user to the queue
        Queue::create([
            'user_id' => auth()->user()->id,
            'table_id' => $request->input('table_id'),
        ]);

        return redirect()->route('available.tables')->with('success', 'You have joined the queue successfully.');
    }

   
    public function showBookingForm()
    {
        // Get current date and time
        $dateTime = now();

        // Example number of guests; adjust this based on your requirements
        $numberOfGuests = 2;

        // Retrieve all tables
        $allTables = Table::all();

        // Filter available tables using isAvailable method
        $availableTables = $allTables->filter(function ($table) use ($dateTime, $numberOfGuests) {
            return $table->isAvailable($dateTime, $numberOfGuests);
        });

        return view('reservation.book_table', compact('availableTables'));
    }


}
