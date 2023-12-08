<?php

// app/Http/Controllers/FeedbackController.php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function showFeedbackForm()
    {
        return view('user.feedback');
    }

    public function submitFeedback(Request $request)
    {
        // Validate the form data
        $request->validate([
            'comments' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Create a new feedback instance and associate it with the authenticated user
        $feedback = new Feedback([
            'user_id' => auth()->id(), // Assuming users are authenticated
            'comments' => $request->input('comments'),
            'rating' => $request->input('rating'),
            // Add any other fields as needed
        ]);

        // Save the feedback to the database
        $feedback->save();

        // Redirect back with a success message
        return redirect()->route('feedback.form')->with('success', 'Feedback submitted successfully!');
    }

    public function showAdminFeedback()
    {
        // Retrieve all feedback for the admin
        $feedbacks = Feedback::all();
    
        // Use the correct view name based on the file you mentioned
        return view('admin.admin_feedback', ['feedbacks' => $feedbacks]);
    }
    
}



