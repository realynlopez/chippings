<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\CartItem;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('user.checkout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            // Add other fields as needed
        ]);

        $order = Order::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            // Add other fields as needed
        ]);

        Log::info('New order received: Order ID ' . $order->id);

        return redirect()->route('thank-you')->with('order_id', $order->id);
    }

    public function checkout(Request $request)
    {
        // Your checkout logic here

        return redirect()->route('user.menu.index')->with('success', 'Checkout successful!');
    }

    public function placeOrder(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'user_id' => 'required', // Adjust validation rules as needed
        'shipping_address' => 'required',
        // Other order details validation rules
    ]);

    // Get the necessary data from the request
    $userId = $request->input('user_id');
    $shippingAddress = $request->input('shipping_address');
    // Other order details

    // Create a new order
    $order = Order::create([
        'user_id' => $userId,
        'shipping_address' => $shippingAddress,
        // Other order details
    ]);

    // Redirect to the thank you page with the order ID
    return redirect()->route('thank-you')->with('order_id', $order->id);
}

public function thankYou()
    {
        // Retrieve the order ID from the session
        $orderId = session('order_id');

        // Perform any necessary logic here based on the order ID
        // For example, you can retrieve the order details from the database

        // Clear the order ID from the session
        session()->forget('order_id');

        // Return the thank-you view or perform other actions as needed
        return view('user.thank-you', compact('orderId'));
    }

}
