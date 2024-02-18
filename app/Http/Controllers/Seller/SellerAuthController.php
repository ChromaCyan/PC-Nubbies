<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SellerAuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('Seller/Auth/Login');
    }

    public function login(Request $request)
    {
        // Add your login logic here
        // Check if the user is a seller and redirect accordingly
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'usertype' => 1])) {
            return redirect()->route('seller.dashboard'); // Redirect to the seller dashboard
        }

        return redirect()->route('seller.login')->with('error', 'User not registered as seller!.');
    }

    public function logout(Request $request)
    {        
        Auth::guard('web')->logout();
       
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/');
        return redirect()->route('seller.login');
    }
}
