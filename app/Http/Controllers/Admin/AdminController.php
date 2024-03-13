<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
    	//This where i'll put the functions to check the table in models for the corresponding shit i need to display in admin dashboard
    	$totalUsers = User::where('usertype',   0)->count();
        $totalSales = Order::where('status', 'paid')->sum('total_price');
        //$timeFrame = 'day';
        //$revenueData = $this->getRevenueData($timeFrame);
        $totalSalesMade = Order::where('status', 'paid')->count();

        //Thank you random stackoverflow guy, shit did work (So basically it goes from order, checks the order product id, from that product id, it checks the categories it belongs in and checks the id of that category., and finally it totals the amount of that and finally get the data.)
        $salesByCategory = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
                        ->join('products', 'order_items.product_id', '=', 'products.id')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->where('orders.status', 'paid')
                        ->selectRaw('categories.name as category_name, COUNT(orders.id) as total_sales')
                        ->groupBy('categories.name')
                        ->get();

        //Shit does work the same way but it checks the user address this time rather than the actual order because it is connected from the user address, which that is connected to user table. so he can check the gender there if it's 0 or 1.                
        $salesByGender = Order::join('user_addresses', 'orders.user_address_id', '=', 'user_addresses.id')
                      ->join('users', 'user_addresses.user_id', '=', 'users.id')
                      ->where('orders.status', 'paid')
                      ->selectRaw('users.gender as gender, COUNT(orders.id) as total_sales')
                      ->groupBy('users.gender')
                      ->get();


        $salesByAgeRange = Order::join('user_addresses', 'orders.user_address_id', '=', 'user_addresses.id')
                        ->join('users', 'user_addresses.user_id', '=', 'users.id')
                        ->where('orders.status', 'paid')
                        ->selectRaw('users.age_range as age_range, COUNT(orders.id) as total_sales')
                        ->groupBy('users.age_range')
                        ->get();

        return Inertia::render('Admin/Dashboard', [
        'totalUsers' => $totalUsers,
        'totalSales' => $totalSales,
        'totalSalesMade' => $totalSalesMade,
        'salesByCategory' => $salesByCategory,
        'salesByGender' => $salesByGender,
        'salesByAgeRange' => $salesByAgeRange,
        //'revenueData' => $revenueData,
    ]);
    }
    /*
    private function getRevenueData($timeFrame)
   {
    $query = Order::query()
        ->selectRaw('DATE(created_at) as date, SUM(total_price) as total_revenue')
        ->groupBy('date');

    if ($timeFrame === 'week') {
        $query->selectRaw('YEARWEEK(created_at) as date, SUM(total_price) as total_revenue')
              ->groupBy('date');
    } elseif ($timeFrame === 'month') {
        $query->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_revenue')
              ->groupBy('year', 'month');
    }

    $revenueData = $query->get();

    return $revenueData;
}
*/

	
}
