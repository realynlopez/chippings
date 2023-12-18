<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminReservationController extends Controller
{
    public function showReservationManagement()
    {
        $pendingReservations = Reservation::where('status', 'pending')->get();
        return view('admin.admin_reservation', compact('pendingReservations'));
    }

    public function acceptReservation(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation) {
            // Update the reservation status to 'confirmed'
            $reservation->status = 'confirmed';
            $reservation->save();

            return redirect()->route('admin.admin_reservation')->with('success', 'Reservation accepted successfully!');
        }

        return redirect()->route('admin.admin_reservation')->with('error', 'Reservation not found!');
    }

    public function declineReservation(Request $request, $id)
    {
        $reservation = Reservation::find($id);

        if ($reservation) {
            // Update the reservation status to 'declined'
            $reservation->status = 'declined';
            $reservation->save();

            return redirect()->route('admin.admin_reservation')->with('success', 'Reservation declined successfully!');
        }

        return redirect()->route('admin.admin_reservation')->with('error', 'Reservation not found!');
    }
}
