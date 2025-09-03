<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query('query');

        $products = Product::with('category', 'brand', 'product_images');

        if ($query) {
            $products = $products->where('title', 'like', '%' . $query . '%')
                ->orWhereHas('category', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('brand', function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%');
                });
        }

        $products = $products->get();

        $brands = Brand::get();
        $categories = Category::get();

        return Inertia::render(
            'Admin/Product/Index',
            [
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories
            ]
        );
    }
}
