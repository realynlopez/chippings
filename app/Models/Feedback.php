<?php

// app/Models/Feedback.php

// app/Models/Feedback.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['comments', 'rating', 'user_id']; // Add 'user_id' to fillable
    protected $table = 'feedbacks';

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
