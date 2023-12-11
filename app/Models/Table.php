<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // app/Models/Table.php

    public function isAvailable($dateTime, $numberOfGuests)
    {
        // Eager load reservations to avoid N+1 query
        $this->load('reservations');

        // Check if the table is available for reservation
        return $this->reservations->where('reservation_date_time', $dateTime)->isEmpty()
            && $this->capacity >= $numberOfGuests;
    }


    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeOccupied($query)
    {
        return $query->where('status', 'occupied');
    }

    public function scopeReserved($query)
    {
        return $query->where('status', 'reserved');
    }

    protected $table = 'tables';
    protected $fillable = ['table_name', 'status'];
}
    
