@props([
    'product' => null
])
@if($product)
    <div class="bg-white shadow-lg rounded-lg p-4">
        <div class="row">
            <div class="col-4">
                <a href="{{ route('product.show', $product->slug) }}">
                    <img src="asset('img\rrlogo.JPG')" alt="{{ $product->name }}"
                         class="h-full w-32 object-cover rounded">
                </a>
            </div>
            <div class="col-8">
                <div class="justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
                    <span class="text-xs font-semibold text-gray-500">
                        <a href="{{ route('category.show', $product->category->slug) }}">
                            {{ $product->category->name }}
                        </a>
                    </span>
                </div>
                <div class="mt-2">
                    <span class="text-gray-500 text-sm">
                        LKR {{ $product->price }}
                    </span>
                </div>
                <p class="text-gray-700 my-2 text-sm">
                    {{ Str::limit($product->description, 60) }}
                </p>
            </div>
        </div>
    </div>
@endif

