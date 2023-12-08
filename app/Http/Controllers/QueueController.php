<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;
use App\Events\QueueUpdated;
use Illuminate\Support\Facades\Log;

class QueueController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            $queue = Queue::all();
        } elseif ($user) {
            $queue = Queue::where('user_id', $user->id)->get();
        } else {
            // Handle the case where $user is null
            // For example, provide an empty queue as the default value
            $queue = collect();
        }

        return view('queue')->with('queue', $queue);
    }


    public function addToQueue(Request $request)
    {
        // Validation
        $this->validate($request, [
            'customer_name' => 'required|string|max:255',
        ]);

        // Get user ID
        $userId = auth()->id();

        // Create a new queue entry
        $queue = Queue::create([
            'customer_name' => $request->input('customer_name'),
            'status' => 'Waiting',
            'user_id' => $userId,
        ]);

        // Fetch the updated queue (you might need to adjust this based on your application's logic)
        $updatedQueue = Queue::all();

        // Broadcast the event
        event(new QueueUpdated($updatedQueue));

        return redirect()->route('queue.index')->with('success', 'Customer added to the queue successfully!');
    }

    public function serveNextCustomer()
    {
        // Find the next customer in the queue with 'Waiting' status
        $nextCustomer = Queue::where('status', 'Waiting')->first();

        if ($nextCustomer) {
            // Update the status to 'Serving' first
            $nextCustomer->update(['status' => 'Serving']);
            
            // Simulate the serving process (you can add actual serving logic here)

            // Update the status to 'Served' after serving
            $nextCustomer->update(['status' => 'Served']);
        }

        return redirect()->route('queue.index');
    }

}
