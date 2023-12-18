<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $fillable = ['customer_name', 'status'];

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
