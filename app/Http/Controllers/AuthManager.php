<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;


class AuthManager extends Controller
{
    public static function getDashboardRoute()
    {
        $user = Auth::user();

        if ($user && is_object($user->role)) {
            switch ($user->role->name) {
                case 'admin':
                    return 'admin.admin-dashboard';
                case 'customer':
                    return 'user.dashboard';
                // Add more cases for other roles if needed
                default:
                    return 'home';
            }
        }

        // Default route if user or role is not defined
        return 'welcome';
    }



    public function login()
    {
        if (Auth::check()) {
            return redirect()->route(self::getDashboardRoute());
        }

        return view('login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect()->route(self::getDashboardRoute());
        }

        return view('registration');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password) || !$user->role_id) {
            return redirect(route('login'))->with('error', 'Incorrect login information');
        }
    
        Auth::login($user);
    
        return redirect()->route(self::getDashboardRoute());
    }


    public function registrationPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id', // Ensure the selected role_id exists in the roles table
        ]);
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ];
    
        $user = new User();
        $user->name = 'Default Name';
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = $request->input('role_id'); // Make sure the selected role_id exists in the roles table
        $user->save();
        if (!$user) {
            return redirect()->route('registration')->with('error', 'Registration failed, try again');
        }
    
        return redirect()->route('login')->with('success', 'Registration success, Login to access the app');
    }
    

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
