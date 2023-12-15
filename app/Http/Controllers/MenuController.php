<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Events\ItemAddedToCart;
use Illuminate\Support\Facades\Redis;
use App\Events\OrderCheckedOut;
use App\Models\Order;
use App\Models\CartItem;

class MenuController extends Controller
{
    

    public function index()
    {
        $menuItems = MenuItem::all();

        return view('admin.menu.index', compact('menuItems'));

    }

    public function create()
    {
        return view('admin.menu.create');
    }
        public function store(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
        
            $imagePath = $request->file('image')->store('images', 'public');
        
            $menuItem = new MenuItem([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'image' => $imagePath,
            ]);
        
            $menuItem->save();
        
            return redirect()->route('admin.menu.index')->with('success', 'Menu item added successfully!');
        }

        public function edit(MenuItem $menuItem)
        {
            return view('admin.menu.edit', compact('menuItem'));
        }
        
        // UPDATE IMAGE NEW //
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);
        
            $menuItem = MenuItem::findOrFail($id);
        
            if ($request->hasFile('image')) {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
        
                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator);
                }
        
                $imagePath = $request->file('image')->store('images', 'public');
        
                $menuItem->update([
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'image' => $imagePath,
                ]);
            } else {
                $menuItem->update($request->only(['name', 'price']));
            }
        
            return redirect()->route('admin.menu.index')->with('success', 'Menu item updated successfully!');
        }

    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted successfully!');
    }

    // menu controller for user //

    public function userIndex()
    {
        $menuItems = MenuItem::all();

        return view('user.menu', compact('menuItems'));
    }

    public function userShow($id)
    {
        $menuItem = MenuItem::findOrFail($id);

        return view('user.menu', compact('menuItem'));
    }

    // MenuController.php

    public function addToCart(Request $request)
    {
        // Handle the logic to add the item to the cart (you may have this already)

        // Notify the admin about the update (you may use events and listeners here)
        return response()->json(['status' => 'success']);
    }  

   
   // Example in your controller method where the user checks out
   public function checkout(Request $request)
    {
        // Assume a user is authenticated; you may need to handle authentication
        $user = auth()->user();

        // Create a new order
        $order = new Order([
            'user_id' => $user->id,
            'shipping_address' => $request->input('shipping_address'),
            // Add other order details as needed
        ]);
        $order->save();

        // Get the user's cart items
        $cartItems = CartItem::where('user_id', $user->id)->get();

        // Move cart items to the order
        foreach ($cartItems as $cartItem) {
            $order->cartItems()->create([
                'menu_item_id' => $cartItem->menu_item_id,
                'quantity' => $cartItem->quantity,
                // Add other cart item details as needed
            ]);
            $cartItem->delete();
        }

        // You may also want to calculate and store the total amount in the order

        // Clear the cart after checkout
        $user->cartItems()->delete();

        return redirect()->route('user.menu.index')->with('success', 'Checkout successful!');
    }
   
}