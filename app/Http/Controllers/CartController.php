<?php

namespace App\Http\Controllers;

use App\Mail\cancelorder;
use App\Mail\OrderPlacedMail;
use Stripe\Stripe;
use App\Models\Cart;
use Stripe\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    // public function index(){
    //     $id=Auth::user()->id;
    //     $cart=Cart::with('product')->where('user_id',$id)->get();
    //     return view('cart',compact('cart'));

    // }
    public function index()
    {
        // Fetch and return cart items for the user
        $cart = Cart::where('user_id', Auth::id())->get();
        return view('cart', compact('cart'));
    }

    public function store($id)
    {
        if (Auth::check()) {
            Cart::updateOrCreate(
                ['product_id' => $id, 'user_id' => Auth::user()->id]
            );
            return redirect()->route('cart.index');
        } else {
            return redirect('login')->with('error', 'Please login to add products to the cart.');
        }
    }

    public function update(Request $req, $id)
    {
        $cart = Cart::find($id);


        $product = Product::find($cart->product_id);

        if ($req->quantity > $product->quantity) {
            return response()->json(['message' => 'Requested quantity exceeds available stock'], 400);
        }

        // Update the cart quantity
        $cart->quantity = $req->quantity;
        $cart->save();

        return response()->json(['message' => 'Cart updated successfully', 'cart' => $cart]);
    }

    public function destroy($id)
    {
        $cart = Cart::find($id)->delete();
        return redirect()->route('cart.index');
    }

    public function createOrder()
    {

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Please log in to proceed to checkout.');
        }

        $id = Auth::user()->id;
        $cart = Cart::with('product')->where('user_id', $id)->get();
        // return $cart;

        return view('checkout', compact('cart'));
    }



    public function storeOrder(Request $req)
    {

        if ($req->method == 1) {
            Stripe::setApiKey('sk_test_51QC2ODIe4idSW70tDuPsYTghj5mmmTHUbF9PktegF6aT3EkievLJ3NsscCWp6xScUAxAxjGBTsJIw68AGuytkWQj00gzHHR6BL');

            try {

                $customer = Customer::create([
                    'name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ]);
                $paymentIntent = PaymentIntent::create([
                    'amount' => $req->amount * 100,
                    'currency' => 'usd',
                    'payment_method' => $req->stripeToken,
                    'customer' => $customer->id,
                    'confirmation_method' => 'manual',
                ]);




                $id = Auth::user()->id;


                $carts = Cart::with('product')->where('user_id', $id)->get();


                if ($carts->isEmpty()) {

                    return redirect()->back()->with('error', 'Your cart is empty. Please add products to the cart before placing an order.');
                }


                $order = new Order();
                $order->price = $req->amount;
                $order->address = $req->address;
                $order->phone = $req->phone;
                $order->user_id = $id;
                $order->status = 1;
                $order->save();

                foreach ($carts as $cart) {

                    $orderItem = new OrderItem();
                    $orderItem->product_id = $cart->product_id;
                    $orderItem->quantity = $cart->quantity;
                    $orderItem->order_id = $order->id;
                    $orderItem->save();


                    $product = Product::find($cart->product_id);
                    if ($product) {

                        if ($product->quantity >= $cart->quantity) {
                            $product->quantity -= $cart->quantity;
                            $product->save();
                        } else {

                            return response()->json(['error' => 'Insufficient stock for product: ' . $product->name], 400);
                        }
                    }
                }


                Cart::where('user_id', $id)->delete();

                // $order = Order::findOrFail($id);
                $orderId = $order->id;
                $mailOrder = Order::findOrFail($orderId);

                Mail::to(Auth::user()->email)->send(new OrderPlacedMail($mailOrder));

                return response()->json([
                    'success' => true,
                    'paymentIntent' => $paymentIntent,
                    'clientSecret' => $paymentIntent->client_secret,
                    'message' => 'Order Placed Successfully',
                ], 200);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()]);
            }
        } else {
            $id = Auth::user()->id;


            $carts = Cart::with('product')->where('user_id', $id)->get();


            if ($carts->isEmpty()) {

                return redirect()->back()->with('error', 'Your cart is empty. Please add products to the cart before placing an order.');
            }

            $order = new Order();
            $order->price = $req->amount;
            $order->address = $req->address;
            $order->phone = $req->phone;
            $order->user_id = $id;
            $order->save();

            foreach ($carts as $cart) {

                $orderItem = new OrderItem();
                $orderItem->product_id = $cart->product_id;
                $orderItem->quantity = $cart->quantity;
                $orderItem->order_id = $order->id;
                $orderItem->save();


                $product = Product::find($cart->product_id);
                if ($product) {

                    if ($product->quantity >= $cart->quantity) {
                        $product->quantity -= $cart->quantity;
                        $product->save();
                    } else {

                        return response()->json(['error' => 'Insufficient stock for product: ' . $product->name], 400);
                    }
                }
            }


            Cart::where('user_id', $id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Order Placed Successfully',
            ], 200);
        }

        // return redirect('my_orders')->with('success', 'Order placed successfully!');
    }


    public function cartcount()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        return view('master', compact('cartCount'));
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);

        if ($order && in_array($order->status, [0, 1])) {
            $order->status = 2;
            $order->delivery = 2;
            $order->save();

            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $item) {
                $product = Product::find($item->product_id);

                if ($product) {
                    $product->quantity += $item->quantity;
                    $product->save();
                    Mail::to(Auth::user()->email)->send(new cancelorder($order));
                }
            }

            return redirect()->back()->with('success', 'Order has been canceled successfully and quantities updated.');
        }

        return redirect()->back()->with('error', 'Unable to cancel the order.');
    }
}
