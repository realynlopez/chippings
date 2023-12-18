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
use Illuminate\Support\Facades\DB;

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
        $itemId = $request->input('item_id');
        $menuItem = MenuItem::find($itemId);

        if (!$menuItem) {
            return response()->json(['status' => 'error', 'message' => 'Item not found']);
        }

        $cartItem = CartItem::updateOrCreate(
            ['menu_item_id' => $menuItem->id],
            ['quantity' => DB::raw('quantity + 1')]
        );

        // Notify the admin or perform other actions as needed

        return response()->json(['status' => 'success']);
    }

    public function checkout(Request $request)
    {
        // Your checkout logic here

        return redirect()->route('checkout.index')->with('success', 'Checkout successful!');
    }
   
   

    public function userDestroy($id)
    {
        try {
            $menuItem = MenuItem::findOrFail($id);
            // Add any additional logic specific to user menu deletion

            $menuItem->delete();

            return redirect()->route('user.menu.index')->with('success', 'Menu item deleted successfully!');
        } catch (\Exception $e) {
            // Log the error or handle it in another way
            return redirect()->route('user.menu.index')->with('error', 'An error occurred while deleting the menu item.');
        }
    }

    public function thankYou()
    {
        // Perform any necessary logic here

        // Redirect to the menu user page
        return redirect()->route('user.menu.index')->with('success', 'Thank you! Your order has been placed successfully.');
    }
}