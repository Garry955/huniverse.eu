<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\Landing;
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
        if (auth()->user()->email == $order->customer_email) {
            $orderItems = json_decode($order->cart_items);
            return view('order.show', ['order' => $order, 'orderItems' => $orderItems]);
        }
        return redirect('/user/edit');
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
        return redirect('/page/order-success')->with(['message' => 'Sikeres vásárlás!', 'orderId' => $order->id]);
    }

    public function success()
    {
        $message = Landing::where('name', 'Sikeres rendelés')->first();

        return view('order.success', ['content' => $message]);
    }

    public function list()
    {

        return view('admin.order_list', ['orders' => Order::latest()->paginate(10)]);
    }

    public function details(Order $order)
    {

        $orderItems = json_decode($order->cart_items);
        return view('admin.order_details', ['order' => $order, 'orderItems' => $orderItems]);
    }

    public function destroy(Order $order)
    {
        if (auth()->user()->is_admin) {
            $order->delete();

            return redirect('admin/orders')->with('message', 'Rendelés #' . $order->id . ' sikeresen törölve.');
        }
        return response(403);
    }
}
