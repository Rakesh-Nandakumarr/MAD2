<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductCategory;

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
}
