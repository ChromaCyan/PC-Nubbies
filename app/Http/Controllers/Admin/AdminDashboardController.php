<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class AdminDashboardController extends Controller
{
    public function show()
    {
        $totalUsers = User::count();
        $totalSales = Order::sum('amount');
        /*$salesByCategory = Sale::selectRaw('category, SUM(amount) as total_sales')
                              ->groupBy('category')
                              ->get();
        $salesByGender = Sale::selectRaw('gender, SUM(amount) as total_sales')
                             ->groupBy('gender')
                             ->get();
        $salesByAgeRange = Sale::selectRaw('age_range, SUM(amount) as total_sales')
                               ->groupBy('age_range')
                               ->get();

        */
        return Inertia::render('Admin/Dashboard', [
            'totalUsers' => $totalUsers,
            'totalSales' => $totalSales,
            /*
            'totalSales' => $totalSales,
            'salesByCategory' => $salesByCategory,
            'salesByGender' => $salesByGender,
            'salesByAgeRange' => $salesByAgeRange,
            */
        ]);

    }
}