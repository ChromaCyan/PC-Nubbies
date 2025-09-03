<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::with('brand', 'category', 'product_images')->orderBy('id','desc')->limit(8)->get();
<<<<<<< HEAD
        return Inertia::render('User/Index', [
            'products'=>$products,
            'canLogin' => app('router')->has('login'),
            'canRegister' => app('router')->has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
=======

        return Inertia::render('User/Index', [
        'products' => $products,
        'canLogin' => app('router')->has('login'),
        'canRegister' => app('router')->has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
    }
}
