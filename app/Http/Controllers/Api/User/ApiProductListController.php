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
    public function index(Request $request)
    {
       
        $filters = $request->all();

       
        $products = Product::with('category', 'brand', 'product_images')
                            ->filtered($filters) 
                            ->paginate(9);

        
        return ProductResource::collection($products)->response();
    }
    
    public function search(Product $product)
    {
    	return new ProductResource($product);
    }
}