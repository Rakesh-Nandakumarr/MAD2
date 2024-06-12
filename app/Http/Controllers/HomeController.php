<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function mount(){
    //     $categories = (new ProductCategory())
    //         ->with([
    //             'products'
    //         ])
    //         ->first();
            
    // }

    public function home()
    {
        $products = (new Product())->where('status', true)->get();
        

        return view('home', [
            'products' => $products,
        ]);
    }

    public function menu()
    {
        $categories = ProductCategory::has('products')->with('products')->get();
        return view('menu', [
            'categories' => $categories,
        ]);

    }

    public function admin_dashboard()
    {

        $products = (new Product());
        $low_stock_products = $products->where('stock', '<', 150)->get();
        $inactive_products = $products->where('status', 0)->get();
        $categories_with_no_products = (new ProductCategory())
            ->doesntHave('products')
            ->get();

            
        return view('dashboard', compact('low_stock_products', 'inactive_products', 'categories_with_no_products'));
    }

    public function cart(){

        $cart = null;

        if (auth()->user()) {
        $cart = auth()
            ->user()
            ->carts()
            ->where('is_paid', false)
            ->first();
            
    }
        return view('cart', compact('cart'));
    }

    public function index()
    {
        return view('order.index', [
            'orders' => Order::paginate(10)
        ]);
    }

    public function create()
    {
        return view('order.form', [
            'order' => new Order(),
            'users' => User::all()
        ]);
    }

    public function order(Request $request)
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

        return redirect('/')->with('success', 'Order successfully created!');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders')->with('success', 'Order successfully deleted!');
    }
}
