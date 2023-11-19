<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    /*public function index()
    {
        // Your logic to check if the user is authenticated
        if (!auth()->check()) {
            // Redirect to the login page
            return redirect()->route('registration');
        }
    }*/

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route($this->getDashboardRoute());
        }

        return view('login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect()->route($this->getDashboardRoute());
        }

        return view('registration');
    }

    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required', // Corrected typo here
        ]);

        $credentials = $request->only(['email', 'password', 'role']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect()->intended(route('admin.dashboard'));
                case 'cashier':
                    return redirect()->intended(route('cashier.dashboard'));
                case 'rider':
                    return redirect()->intended(route('rider.dashboard'));
                case 'customer':
                    return redirect()->intended(route('customer.dashboard'));
                default:
                    return redirect()->intended(route('home'));
            }
        }

        return redirect(route('login'))->with("error", "Incorrect login information");
    }

    public function registrationpost(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "role" => "required", 
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role" => $request->role, 
        ];

        $user = User::create($data);

        if (!$user) {
            return redirect()->route('registration')->with("error", "Registration failed, try again");
        }

        return redirect()->route('login')->with("success", "Registration success, Login to access the app");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function admin()
    {
        return view('admin.dashboard');
    }


}
