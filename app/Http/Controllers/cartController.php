<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Product $product, Request $request)
    {
        $customer_id = auth()->user()->id ?? Session::getId();
        if (!Cart::where('customer_id', $customer_id)->first()) {
            $cart = Cart::create(['customer_id' => $customer_id])->first();
        } else {
            $cart = Cart::where('customer_id', $customer_id)->first();
        }
        if ($request->quantity == 0) {
            CartDetail::where(
                ['cart_id' => $cart->id, 'product_id' => $product->id]
            )->delete();
        } else {
            CartDetail::updateOrCreate(
                ['cart_id' => $cart->id, 'product_id' => $product->id],
                ['quantity' => $request->quantity]
            );
        }

        return redirect()->back()->with('message', $product->name . ' added to your cart');
    }

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
        return view('cart.show')->with([
            'cartTotal' => $cartTotal,
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'cartID' => $cartID
        ]);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/')->with('message', 'Cart deleted successfully');
    }
}
