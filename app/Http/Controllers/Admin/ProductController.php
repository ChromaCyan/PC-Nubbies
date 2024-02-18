<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
	

    public function index(){
    	$products = Product::get();
    	
    	return Inertia::render('Admin/Product/Index');
    }
}
