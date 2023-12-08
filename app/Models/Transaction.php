<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'description',
        'transaction_date',
        // Add other fields as needed
    ];
    protected $dates = ['transaction_date'];
}
