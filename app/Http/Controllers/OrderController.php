<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index', [

            // Fetch all orders and paginate and in the list who show the paid orders first and then the not paid ones
            'orders' => Order::orderBy('payment_status', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.form', [
            'order' => new Order(),
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())->first();

        // Ensure the cart exists
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'You need a cart to place an order.');
        }

        // Validate the request data
        $validated = $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_address' => 'required',
            'shipping_post_code' => 'required',
            'shipping_city' => 'required',
            'shipping_district' => 'required',
            'shipping_phone' => 'required',
            'billing_first_name' => 'nullable',
            'billing_last_name' => 'nullable',
            'billing_address' => 'nullable',
            'billing_post_code' => 'nullable',
            'billing_city' => 'nullable',
            'billing_district' => 'nullable',
            'billing_phone' => 'nullable',
        ]);

        // Set user_id and cart_id in the validated data
        $validated['user_id'] = auth()->id();
        $validated['cart_id'] = $cart->id;
        $validated['total'] = $cart->total;

        // Check if billing address is null and copy from shipping address if necessary
        if (is_null($validated['billing_address'])) {
            $validated['billing_first_name'] = $validated['shipping_first_name'];
            $validated['billing_last_name'] = $validated['shipping_last_name'];
            $validated['billing_address'] = $validated['shipping_address'];
            $validated['billing_post_code'] = $validated['shipping_post_code'];
            $validated['billing_city'] = $validated['shipping_city'];
            $validated['billing_district'] = $validated['shipping_district'];
            $validated['billing_phone'] = $validated['shipping_phone'];
        }

        Order::create($validated);

        return redirect('stripe')->with('order_products', $cart);
    }

    public function show(Order $order)
    {
        // Fetch the cart associated with the order
        $cart = $order->cart;
        // Fetch the products associated with the cart
        $products = $cart ? $cart->products : collect();

        // Pass the order and products to the view
        return view('admin.order.show', [
            'order' => $order,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.form', [
            'order' => $order,
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Validate the request data
        $validated = $request->validate([
            'shipping_first_name' => 'required',
            'shipping_last_name' => 'required',
            'shipping_address' => 'required',
            'shipping_post_code' => 'required',
            'shipping_city' => 'required',
            'shipping_district' => 'required',
            'shipping_phone' => 'required',
            'billing_first_name' => 'nullable',
            'billing_last_name' => 'nullable',
            'billing_address' => 'nullable',
            'billing_post_code' => 'nullable',
            'billing_city' => 'nullable',
            'billing_district' => 'nullable',
            'billing_phone' => 'nullable',
            'shipping_status' => 'required',
        ]);

        // Check if billing address is null and copy from shipping address if necessary
        if (is_null($validated['billing_address'])) {
            $validated['billing_first_name'] = $validated['shipping_first_name'];
            $validated['billing_last_name'] = $validated['shipping_last_name'];
            $validated['billing_address'] = $validated['shipping_address'];
            $validated['billing_post_code'] = $validated['shipping_post_code'];
            $validated['billing_city'] = $validated['shipping_city'];
            $validated['billing_district'] = $validated['shipping_district'];
            $validated['billing_phone'] = $validated['shipping_phone'];
        }

        // Ensure user_id and cart_id remain unchanged
        $validated['user_id'] = $order->user_id;
        $validated['cart_id'] = $order->cart_id;
        $validated['total'] = $order->total;

        $order->update($validated);

        return redirect()->route('order.index')->with('success', 'Order successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order successfully deleted!');
    }
}
