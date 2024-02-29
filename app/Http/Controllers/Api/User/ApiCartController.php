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

        $cartItemsArray = $this->getCartItemsArray($cartItems, $products);

        return new CartResource([$products, $cartItemsArray]);
    }

    private function getCartItemsArray($cartItems, $products)
    {
        
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

public function delete(Request $request, Product $product)
    {
        $user = $request->user();

        if ($user) {
            // Delete the cart item for the authenticated user
            CartItem::where(['user_id' => $user->id, 'product_id' => $product->id])->delete();

            // Check if the user's cart is empty
            $cartItemsCount = CartItem::where('user_id', $user->id)->count();
            if ($cartItemsCount <= 0) {
                return response()->json(['message' => 'Your cart is empty'], 200);
            } else {
                return response()->json(['message' => 'Item removed successfully'], 200);
            }
        } else {
            // If the user is not authenticated, you might want to handle this differently
            // For example, you could return an error response
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

}
