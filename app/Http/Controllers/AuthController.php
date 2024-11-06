<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller{
    public function login(Request $request){
        return view('auth.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        $rememberMe = !empty($request->remember_me);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $rememberMe)) {
            // Regenerate the session ID to prevent session fixation attacks
            $request->session()->regenerate();
            // Update the remember token for the user
            $user = Auth::user();
            $user->update([ 'remember_token' => Str::random(40) ]);
            // Redirect to dashboard with a success message
            return redirect('dashboard')->with('success', 'You are now logged in');
        }
        // If authentication fails, redirect back with an error message
        return back()->with('error', 'Invalid email or password');
    }

    public function logout(Request $request){
        // Log the user out of the application
        Auth::logout();

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login with a success message
        return redirect('login')->with('success', 'Logged out successfully!');
    }
}
