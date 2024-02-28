<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Admin/Auth/Login');
    }

    public function login(Request $request)
    {
    // Attempt to authenticate the user
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

        //I mean if the usertype is 1 which i designate into addmin then it will go to admin dashboard
        if (Auth::user()->usertype == 1) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('home'); // Redirect to the user dashboard or home page
        }
    }

    return redirect()->route('admin.login')->with('error', 'Invalid credentials.');
    }


    public function logout(Request $request)
    {        
    Auth::guard('web')->logout();
   
    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
    }

}
