<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function create(){
        return inertia('Auth/Login');
    }

    public function store(Request $request){
        // using the Auth method to validate and set a cookie on the web
        // to set the login time to always
        if (!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]), true)) {
            throw ValidationException::withMessages([
                'email' => 'Authentication Failed'
            ]);
            
        }
        // Reseting the session id to prevent attacks from user
            // clicking on the link eith thier sessionID
            $request->session()->regenerate();
            return redirect()->intended();
    }

    public function destroy(){
        
    }
}
