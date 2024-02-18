<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SellerController extends Controller
{
    public function index()
    {
        
        return Inertia::render('Seller/Dashboard');
    }
}
