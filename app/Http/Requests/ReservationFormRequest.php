<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationFormRequest extends FormRequest
{
    public function rules()
    {
        return [
            'reservation_date_time' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'table_id' => 'required|exists:tables,id',
            // Add more validation rules as needed
        ];
    }
}
