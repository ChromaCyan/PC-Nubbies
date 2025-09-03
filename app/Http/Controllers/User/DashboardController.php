<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    function index()
    {
<<<<<<< HEAD
        $orders = Order::with('order_items.product.brand', 'order_items.product.category')->get();
=======
        $orders = Order::with('order_items.product.brand', 'order_items.product.category')
                        ->where('status', 'paid')
                        ->get();
                        
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
        return Inertia::render('User/Dashboard', ['orders' => $orders]);
    }
}
