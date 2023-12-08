<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = [
        'customer_name', // Add any other fillable attributes here
        'status',
        'user_id',
    ];
}
