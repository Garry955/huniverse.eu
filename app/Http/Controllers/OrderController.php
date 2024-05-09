<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function show()
    {
        $cartTotal = Cart::getTotal() ?? 0;
        $customer_id = auth()->user() ? auth()->user()->id : Session::getId();
        $cartID = Cart::where('customer_id', $customer_id)->first()?->id;
        $cartItems = CartDetail::where('cart_id', $cartID)->with('product')->get();
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += ($item->quantity * $item->product->price);
        }
        return view('order.show')->with([
            'cartTotal' => $cartTotal,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'cartID' => $cartID
        ]);
    }

    public function store(Request $request)
    {
        $cart_items = json_decode($request->cart_items);
        foreach ($cart_items as $product) {
            $stock = $product->product->stock - $product->quantity;
            dd($stock);
            Product::where([
                'id' => 'product_id'
            ])->patch([
                'stock' => $stock
            ]);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $formFields = [
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'customer_address' => $request->address,
            'customer_comment' => $request->comment,
            'cart_items' => $request->cart_items,
            'order_total' => $request->order_total
        ];
        $order = Order::create($formFields);
        if ($order) {
            Cart::destroy($request->cart_id);
            $cart_items = json_decode($request->cart_items);
            foreach ($cart_items as $product) {
                Product::where([]);
            }
        }

        return redirect('/')->with('message', 'Sikeres vásárlás!');
    }
}
