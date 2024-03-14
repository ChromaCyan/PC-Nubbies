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


        // Define a default time frame. For example, 'day'
        $defaultTimeFrame = 'day';

        // Pass the default time frame to getRevenueData
        $revenueData = $this->getRevenueData($defaultTimeFrame);

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
        'revenueData' => $revenueData,
    ]);
    }

    public function fetchRevenueData(Request $request)
        {
            $timeFrame = $request->input('timeFrame');
            $revenueData = $this->getRevenueData($timeFrame);
            return response()->json($revenueData);
        }

        private function getRevenueData($timeFrame)
    {
        $query = Order::query()
            ->where('status', 'paid') // Ensure only paid orders are considered
            ->selectRaw('DATE(created_at) as date, SUM(total_price) as total_revenue')
            ->groupBy('date');

        // Use Carbon to get the start and end of the current day
        $startOfDay = Carbon::now()->startOfDay();
        $endOfDay = Carbon::now()->endOfDay();

        // Apply the date filter based on the selected time frame
        if ($timeFrame === 'day') {
            // For the 'day' time frame, filter orders created today
            $query->whereBetween('created_at', [$startOfDay, $endOfDay]);
        } elseif ($timeFrame === 'week') {
            // For the 'week' time frame, filter orders created this week
            $query->whereBetween('created_at', [$startOfDay->startOfWeek(), $endOfDay->endOfWeek()]);
        } elseif ($timeFrame === 'month') {
            // For the 'month' time frame, filter orders created this month
            $query->whereBetween('created_at', [$startOfDay->startOfMonth(), $endOfDay->endOfMonth()]);
        }

        $revenueData = $query->get();

        return $revenueData;
    }


}
