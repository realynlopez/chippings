<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class QueueController extends Controller
{
    public function addToQueue(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
        ]);

        $queue = Queue::create([
            'customer_name' => $request->input('customer_name'),
            'status' => 'waiting',
        ]);

        return redirect()->route('queue')->with('success', 'Customer added to the queue successfully.');
    }

    public function showQueue()
    {
        $queue = Queue::orderBy('created_at')->get();
        return view('queue', compact('queue'));
    }

    public function serveNextCustomer()
    {
        $nextCustomer = Queue::where('status', 'waiting')->orderBy('created_at')->first();

        if ($nextCustomer) {
            $nextCustomer->update(['status' => 'serving']);
            return redirect()->route('queue')->with('success', 'Next customer is now being served.');
        }

        return redirect()->route('queue')->with('info', 'No customers in the waiting queue.');
    }

    public function showUserQueue()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        // Fetch the queue items for the user with related reservation information
        $queue = Queue::with('reservation')->where('customer_name', $user->name)->orderBy('created_at')->get();

        return view('user.queue_status', compact('queue'));
    }

}
