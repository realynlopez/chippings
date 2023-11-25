<?php

// In app/Http/Controllers/QueueController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;

class QueueController extends Controller
{
    // app/Http/Controllers/QueueController.php

    public function index()
    {
        $queue = Queue::all();

        return view('queue')->with('queue', $queue);
    }   


    public function addToQueue(Request $request)
    {
        $customerName = $request->input('customer_name');

        Queue::create([
            'customer_name' => $customerName,
            'status' => 'Waiting',
        ]);

        return redirect()->route('queue.index')->with('success', 'Customer added to the queue successfully!');
    }

    public function serveNextCustomer()
    {
        $nextCustomer = Queue::where('status', 'Waiting')->first();

        if ($nextCustomer) {
            $nextCustomer->update(['status' => 'Served']);
        }

        return redirect()->route('queue.index');
    }
}
