<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }   

    function loginpost(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            switch ($user->role) {
            case 'admin':
                return redirect()->intended(route('admin.dashboard'));
            case 'cashier':
                return redirect()->intended(route('cashier.dashboard'));
            // Add cases for other roles (rider, customer) as needed
            default:
                return redirect()->intended(route('home'));
            }   

        }
    
        return redirect(route('login'))->with("error", "Login details are not valid");
    }
    

    function registrationpost(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:users",
            "password"=> "required"
        ]);

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with ("error","Registration failed, try again");
        }
        return redirect(route('login'))->with ("success","Registration success, Login to access the app");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    function showHome(){
        return view('home');
    }
    function homepost(Request $request)
    {
        // Handle the logic for processing the POST request
        // You can access form data using $request->input('your_input_name')

        return redirect()->route('home')->with('success', 'Post request successful.');
    }
    function showAbout(){
        return view('about');
    }
    function aboutpost(Request $request)
    {
        // Handle the logic for processing the POST request
        // You can access form data using $request->input('your_input_name')

        return redirect()->route('about')->with('success', 'Post request successful.');
    }

    function showMenu(){
        return view('menu');
    }
    function menupost(Request $request)
    {
        // Handle the logic for processing the POST request
        // You can access form data using $request->input('your_input_name')

        return redirect()->route('menu')->with('success', 'Post request successful.');
    }
}

