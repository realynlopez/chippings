<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Events\TableUpdated;
use App\Models\Queue;


class ReservationController extends Controller
{    
    public function showAvailableTables()
    {
        $tables = Table::whereDoesntHave('reservations', function ($query) {
            // Check for available tables based on reservations
        })->get();

        return view('reservation.available_tables', compact('tables'));
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
        $availableTables = Table::all();

        return view('reservation.book_table', compact('availableTables'));
    }

    // ReservationController.php
    public function storeReservation(Request $request)
    {
        // Validate the form data (customize the validation rules based on your requirements)
        $validatedData = $request->validate([
            'reservation_date_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
            // Add more validation rules as needed
        ]);

        // Store the reservation in the database
        $reservation = new Reservation();
        $reservation->user_id = auth()->user()->id; // Assuming you're using authentication
        $reservation->table_id = $validatedData['table_id'];
        $reservation->reservation_date_time = $validatedData['reservation_date_time'];
        $reservation->number_of_guests = $validatedData['number_of_guests'];
        // Add more fields as needed
        $reservation->save();

        // Redirect to the queue status page after successful reservation
        return redirect()->route('queue.status')->with('success', 'Table reserved successfully!');
    }



    public function reserveTable(Request $request)
    {
        // Validate the request
        $request->validate([
            'reservation_date_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
        ]);

        // Check table availability (optional, depending on your validation logic)
        $table = Table::find($request->input('table_id'));
        if (!$table || !$table->isAvailable($request->input('reservation_date_time'), $request->input('number_of_guests'))) {
            return redirect()->route('book.table')->with('error', 'Selected table is not available for the given date and time.');
        }

        // Create a reservation
        Reservation::create([
            'user_id' => auth()->user()->id,
            'table_id' => $request->input('table_id'),
            'reservation_date_time' => $request->input('reservation_date_time'),
            'number_of_guests' => $request->input('number_of_guests'),
        ]);

       // In your ReservationController.php
    return redirect()->route('user.dashboard')->with('confirmation', 'Waiting for confirmation.')->with('success', 'Table reserved successfully!');

    }

    

}
