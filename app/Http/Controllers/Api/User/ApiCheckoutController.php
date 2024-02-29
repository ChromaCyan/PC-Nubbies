<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class ApiCheckoutController extends Controller
{
    public function saveAddress(Request $request)
    {
        $request->validate([
            'address1' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'country_code' => 'required',
            'type' => 'required',
        ]);

        $user = $request->user();
        $address = new UserAddress();
        $address->address1 = $request->address1;
        $address->state = $request->state;
        $address->zipcode = $request->zipcode;
        $address->city = $request->city;
        $address->country_code = $request->country_code;
        $address->type = $request->type;
        $address->user_id = $user->id;
        $address->isMain = 1; // Assuming you want to set this as the main address
        $address->save();

        return response()->json(['message' => 'Address saved successfully', 'address_id' => $address->id]);
    }

    public function store(Request $request)
    {
        $user = $request->user();
        $carts = $request->carts;
        $products = $request->products;

        $mergedData = [];

        // Loop through the "carts" array and merge with "products" data
        foreach ($carts as $cartItem) {
            foreach ($products as $product) {
                if ($cartItem["product_id"] == $product["id"]) {
                    $mergedData[] = array_merge($cartItem, ["title" => $product["title"], 'price' => $product['price']]);
                }
            }
        }

        // Stripe payment
        Stripe::setApiKey(env('STRIPE_KEY'));
        $lineItems = [];
        foreach ($mergedData as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['title'],
                    ],
                    'unit_amount' => (int)($item['price'] * 100),
                ],
                'quantity' => $item['quantity'],
            ];
        }

        $checkout_session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => env('APP_URL') . '/api/checkout/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('APP_URL') . '/api/checkout/cancel',
        ]);

        // Create Order
        $order = new Order([
            'total_price' => $request->total,
            'status' => 'unpaid',
            'session_id' => $checkout_session->id,
            'created_by' => $user->id,
            'updated_by' => $user->id,
            'user_address_id' => $request->address_id,
        ]);
        $order->save();

        // Create OrderItems
        foreach ($mergedData as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],
            ]);
        }

        // Clear the user's cart
        CartItem::where('user_id', $user->id)->delete();

        // Return the session ID as JSON
        return response()->json(['session_id' => $checkout_session->id]);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));
        $sessionId = $request->get('session_id');
        try {
            $session = Session::retrieve($sessionId);
            if (!$session) {
                return response()->json(['error' => 'Session not found'], 404);
            }
            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                return response()->json(['error' => 'Order not found'], 404);
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }

            return response()->json(['message' => 'Payment successful']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }
}
