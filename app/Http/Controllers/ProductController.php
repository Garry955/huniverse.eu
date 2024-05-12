<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->query()["search"]) {
            $products = Product::latest()
                ->where('name', 'like', '%' . request()->query()["search"] . '%')
                ->orWhere('description', 'like', '%' . request()->query()["search"] . '%')->paginate(9);
        } else {
            $products = Product::latest()->paginate(9);
        }

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'description' => 'required|min:6',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        $formFields['link'] = $request->link;

        //File upload
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->hashName();
            $request->file('image')->store('/products/', 'public');
        }

        Product::create($formFields);

        return redirect('/admin/dashboard')->with('message', 'Sikeres termékfelvétel.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $quantity = 1;
        $customer_id = auth()->user() ? auth()->user()->id : Session::getId();
        $cartID = Cart::where('customer_id', $customer_id)->first()?->id;
        $cartItems = CartDetail::where(['cart_id' => $cartID, 'product_id' => $product->id])->with('product')->first();

        if ($cartItems) {
            $quantity = $cartItems->quantity;
        }

        return view('products.show')->with([
            'product' => $product,
            'quantity' => $quantity
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $formFields = $request->validate([
            'name' => 'required|min:6',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'description' => 'required|min:6',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
        $formFields['price'] = $request->price;
        $formFields['link'] = $request->link;

        //File upload
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->hashName();
            $request->file('image')->store('/products/', 'public');
            if (Storage::exists('public/products/' . $product->image)) {
                Storage::delete('public/products/' . $product->image);
            }
        }
        $product->update($formFields);

        return redirect()->back()->with('message', 'Termék sikeresen módosítva');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $product->delete();
        return redirect('/admin/dashboard')->with('message', '#' . $product->id . ' - ' . $product->name . ' sikeresen törölve!');
    }
}
