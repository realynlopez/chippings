<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminReservation extends Model
{
    protected $fillable = [
        'user_id', 'table_id', 'reservation_date_time', 'number_of_guests'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
