<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch all orders with their related data
        $orders = Order::with(['order_items', 'createBy'])->get();

        // Pass the orders to the view
        return Inertia::render('Admin/Order/Index', [
            'orders' => $orders
        ]);
    }
}
