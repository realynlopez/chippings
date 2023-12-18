<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Reservation;
use App\Models\Queue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure that only authenticated users can access reservation features
    }

    public function showAvailableTables()
    {
        $tables = Table::whereDoesntHave('reservations', function ($query) {
            // Check for available tables based on reservations
        })->get();

        return view('reservation.available_tables', compact('tables'));
    }

    public function joinQueue(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
        ]);

        $existingQueue = Queue::where('user_id', auth()->user()->id)->first();

        if ($existingQueue) {
            return redirect()->route('available.tables')->with('error', 'You are already in the queue.');
        }

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

    public function reserveTable(Request $request)
    {
        $request->validate([
            'reservation_date_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
        ]);

        try {
            DB::beginTransaction();

            $table = Table::find($request->input('table_id'));

            // Check if the table exists
            if (!$table) {
                return redirect()->route('book.table')->with('error', 'Selected table does not exist.');
            }

            // Create a reservation with a 'pending' status
            $reservation = Reservation::create([
                'user_id' => auth()->user()->id,
                'table_id' => $request->input('table_id'),
                'reservation_date_time' => $request->input('reservation_date_time'),
                'number_of_guests' => $request->input('number_of_guests'),
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()->route('user.dashboard')->with('success', 'Table reservation requested. Admin will review and confirm.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('book.table')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }



    private function isTableAvailable(Table $table, $reservationDateTime, $numberOfGuests)
    {

        Log::info("Table: " . $table->id);
        Log::info("Reservation DateTime: " . $reservationDateTime);
        Log::info("Number of Guests: " . $numberOfGuests);
        $existingReservations = Reservation::where('table_id', $table->id)
            ->where('reservation_date_time', $reservationDateTime)
            ->get();

        $totalGuests = $existingReservations->sum('number_of_guests') + $numberOfGuests;

        return $totalGuests <= $table->capacity;
    }
}
