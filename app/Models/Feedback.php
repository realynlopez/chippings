<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function submitFeedback(Request $request, Feedback $feedback)
    {
        // Validate the form data
        $request->validate([
            'comments' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new feedback instance and associate it with the authenticated user
        $feedback->user_id = auth()->id();
        $feedback->comments = $request->input('comments');
        $feedback->rating = $request->input('rating');
        // Add any other fields as needed

        // Save the feedback to the database
        $feedback->save();

        // Redirect back with a success message
        return redirect()->route('feedback.form')->with('success', 'Feedback submitted successfully!');
    }
}
