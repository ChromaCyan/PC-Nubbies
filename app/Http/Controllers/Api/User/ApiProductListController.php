<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductListController extends Controller
{
    public function index()
{
    $products = Product::with('category', 'brand', 'product_images')->filtered()->paginate(9);
    return response()->json($products);
}

}
