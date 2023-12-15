<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // app/Models/Order.php

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
