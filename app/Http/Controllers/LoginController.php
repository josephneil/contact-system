<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('contacts.index');
        }

        return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
    }
    
    public function logout(Request $request)
    {
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();

        Auth::logout();

        return redirect()->route('login');
    }
}
