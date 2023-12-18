<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
class MenuItem extends Model
{
    use HasFactory;

    protected $table = 'menu_items'; // specify the table name

    protected $fillable = [
        'name',
        'price',
        'image', // Include the 'image' field in the fillable array
        // Add other fields as needed
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}
