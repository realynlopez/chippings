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

        
    
        public function isAvailable($dateTime, $numberOfGuests)
        {
            // Logic to check for available tables based on reservations
            $reservedTables = $this->reservations()
                ->where('reservation_date_time', $dateTime)
                ->where('number_of_guests', '<=', $numberOfGuests)
                ->pluck('table_id')
                ->toArray();
    
            return !in_array($this->id, $reservedTables);
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
    
