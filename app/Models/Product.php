<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function showProduct($id)
    {
        $product = Product::findOrFail($id);

        // You can customize this view or redirect logic based on your requirements
        return view('admin.show-product', compact('product'));
    }
}

