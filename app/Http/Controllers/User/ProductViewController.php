<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use Inertia\Inertia;

class ProductViewController extends Controller
{
    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'product_images'])->findOrFail($id);

        $productData = new ProductResource($product);

        return Inertia::render('User/Components/ProductView', [
            'product' => $productData,
        ]);
    }
}