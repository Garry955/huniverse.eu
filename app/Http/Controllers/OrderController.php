<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where([
            'customer_email' => $user->email
        ])->latest()->paginate(5);
        return view('order.index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        $orderItems = json_decode($order->cart_items);
        return view('order.show', ['order' => $order, 'orderItems' => $orderItems]);
    }

    public function store(Request $request)
    {
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
            'customer_comment' => $request->comment ?? "",
            'cart_items' => $request->cart_items,
            'order_total' => $request->order_total
        ];
        $order = Order::create($formFields);
        if ($order) {
            Cart::destroy($request->cart_id);
            // stock refres
            $cart_items = json_decode($request->cart_items);
            foreach ($cart_items as $product) {
                $stock = $product->product->stock - $product->quantity;
                // dd($product->product->id);
                Product::where([
                    'id' => $product->product->id
                ])->update([
                    'stock' => $stock
                ]);
            }
        }
        return redirect('/order/success')->with(['message' => 'Sikeres vásárlás!', 'orderId' => $order->id]);
    }

    public function success()
    {
        return view('order.success');
    }
}
