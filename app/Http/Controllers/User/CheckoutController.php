<?php

namespace App\Http\Controllers\User;

use App\Helper\Cart;
use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CheckoutController extends Controller
{
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
                    // Merge the cart item with product data
                    $mergedData[] = array_merge($cartItem, ["title" => $product["title"], 'price' => $product['price']]);
                }
            }
        }

        //stripe payment 
        $stripe = new \Stripe\StripeClient(env('STRIPE_KEY'));
        $lineItems = [];
        foreach ($mergedData as $item) {
            $lineItems[] =
                [
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

<<<<<<< HEAD


=======
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' =>  $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);


        $newAddress = $request->address;
        if ($newAddress['address1'] != null) {
            $address = UserAddress::where('isMain', 1)->count();
            if ($address > 0) {
                $address = UserAddress::where('isMain', 1)->update(['isMain' => 0]);
            }
            $address = new UserAddress();
            $address->address1 = $newAddress['address1'];
            $address->state = $newAddress['state'];
            $address->zipcode = $newAddress['zipcode'];
            $address->city = $newAddress['city'];
            $address->country_code = $newAddress['country_code'];
            $address->type = $newAddress['type'];
            $address->user_id = Auth::user()->id;
            $address->save();
        }
        $mainAddress = $user->user_address()->where('isMain', 1)->first();
        if ($mainAddress) {
            $order = new Order();
<<<<<<< HEAD
            $order->status = 'unpaid';
            $order->total_price = $request->total;
            $order->session_id = $checkout_session->id;
            $order->created_by = $user->id;
            // If a main address with isMain = 1 exists, set its id as customer_address_id
=======
            $order->status = 'cancelled';
            $order->total_price = $request->total;
            $order->session_id = $checkout_session->id;
            $order->created_by = $user->id;
            
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
            $order->user_address_id = $mainAddress->id;
            $order->save();
            $cartItems = CartItem::where(['user_id' => $user->id])->get();
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
<<<<<<< HEAD
                    'order_id' => $order->id, // Assuming you have an 'id' field in your orders table
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->product->price, // You may adjust this depending on your logic
                ]);
                $cartItem->delete();
                //remove cart items from cookies
=======
                    'order_id' => $order->id, 
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->product->price, 
                ]);
                $cartItem->delete();
                
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                $cartItems = Cart::getCookieCartItems();
                foreach ($cartItems as $item) {
                    unset($item);
                }
                array_splice($cartItems, 0, count($cartItems));
                Cart::setCookieCartItems($cartItems);
            }

            $paymentData = [
                'order_id' => $order->id,
                'amount' => $request->total,
<<<<<<< HEAD
                'status' => 'pending',
                'type' => 'stripe',
                'created_by' => $user->id,
                'updated_by' => $user->id,
                // 'session_id' => $session->id
=======
                'status' => 'cancelled',
                'type' => 'stripe',
                'created_by' => $user->id,
                'updated_by' => $user->id,
                
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
            ];

            Payment::create($paymentData);
        }
        return Inertia::location($checkout_session->url);
    }

    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_KEY'));
        $sessionId = $request->get('session_id');
        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }
            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
<<<<<<< HEAD
            if ($order->status === 'unpaid') {
=======
            if ($order->status === 'cancelled') {
>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
                $order->status = 'paid';
                $order->save();
            }

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }
<<<<<<< HEAD
=======

    public function cancel(Request $request)
{
    $orderId = session('order_id');

    if ($orderId) {
        $order = Order::find($orderId);
        if ($order->status === 'unpaid'){
            $order->status = 'cancelled';
            $order->save();
        }

        $payment = Payment::where('order_id', $orderId)->first();
        if ($payment->status === 'pending'){
            $payment->status = 'cancelled';
            $payment->save();
        }
    }

    return Inertia::render('User/Index', [
        'message' => 'Order cancelled. You can continue shopping.',
    ]);
}

>>>>>>> 539b01a78333c5afd9b506c2a4e3d33686af6268
}
