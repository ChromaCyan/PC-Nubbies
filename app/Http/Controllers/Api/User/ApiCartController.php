<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Http\Resources\CartResource;

class ApiCartController extends Controller
{
    public function getCartItems(Request $request)
    {
        $user = $request->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $products = Product::whereIn('id', $cartItems->pluck('product_id'))->get();

        // Assuming you have a method to get cart items as an associative array
        $cartItemsArray = $this->getCartItemsArray($cartItems, $products);

        return new CartResource([$products, $cartItemsArray]);
    }

    private function getCartItemsArray($cartItems, $products)
    {
        // Convert CartItem collection to an associative array
        // This is a simplified example. You might need to adjust it based on your actual data structure.
        $cartItemsArray = [];
        foreach ($cartItems as $cartItem) {
            $cartItemsArray[$cartItem->product_id] = ['quantity' => $cartItem->quantity];
        }
        return $cartItemsArray;
    }

    public function store(Request $request, Product $product)
{
    $quantity = $request->input('quantity', 1);
    $user = $request->user();

    if (!$user) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $cartItem = CartItem::firstOrCreate(
        ['user_id' => $user->id, 'product_id' => $product->id],
        ['quantity' => $quantity]
    );

    if ($cartItem->wasRecentlyCreated) {
        return response()->json(['message' => 'Product added to cart'], 201);
    } else {
        $cartItem->increment('quantity', $quantity);
        return response()->json(['message' => 'Product quantity updated'], 200);
    }
}

}
