<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::orderBy('id')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.form', [
            'product' => new Product(),
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
            'thumbnail' => 'required|image'
        ]);
        if($request->has('thumbnail')){
            $file = $request->file('thumbnail');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'img/';
            $file->move($path, $fileName);
        }

        $validatedData['thumbnail'] = $path.$fileName;
        $product = Product::create($validatedData);

        if ($request->hasFile('featured_image')) {
            $product->addMedia($request->file('featured_image'))->toMediaCollection('featured_image');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $product->addMedia($file)->toMediaCollection('gallery');
            }
        }

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Product $product)
    {
        $user = auth()->user();
        // check if user is logged in
        $hasPurchased = false;

        if(auth()->check()){
            $hasPurchased = $user->orders()->whereHas('cart.products', function ($query) use ($product) {
                $query->where('products.id', $product->id);
            })->exists();
        }
        return view('product.show', compact('product', 'hasPurchased'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.form', [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'order_by' => 'nullable|integer',
            'status' => 'required|boolean',
        ]);
        if($request->has('thumbnail')){
            $file = $request->file('thumbnail');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'img/';
            $file->move($path, $fileName);
            if(File::exists($product->thumbnail)){
                File::delete($product->thumbnail);
                $validatedData['thumbnail'] = $path.$fileName;
            }
            
        }

        

        $product->update($validatedData);

        if ($request->hasFile('featured_image')) {
            $product->clearMediaCollection('featured_image');
            $product->addMedia($request->file('featured_image'))->toMediaCollection('featured_image');
        }

        if ($request->hasFile('gallery')) {
            $product->clearMediaCollection('gallery');
            foreach ($request->file('gallery') as $file) {
                $product->addMedia($file)->toMediaCollection('gallery');
            }
        }

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
