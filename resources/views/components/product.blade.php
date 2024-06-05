@props([
    'product' => null
])

@if($product)
    <div class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 md:hover:scale-105 mx-2 md:mx-0">
        <a href="{{ route('productshow', $product->slug) }}">
            <img src="{{ $product->getFirstMediaUrl('featured_image') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
        </a>
        <div class="p-4">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <a href="{{ route('productshow', $product->slug) }}" class="text-lg font-bold text-gray-800 md:hover:text-brown-600 transition duration-300 mt-2 sm:mt-0">
                    {{ $product->name }}
                </a>
                <span class="text-sm font-medium text-gray-500 mt-1 sm:mt-0">
                    <a href="{{ route('category.show', $product->category->slug) }}" class="md:hover:text-brown-600 transition duration-300">
                        {{ $product->category->name }}
                    </a>
                </span>
            </div>
            <div class="mt-2">
                <span class="text-brown-600 font-semibold">
                    LKR {{ $product->price }}
                </span>
            </div>
            <p class="text-gray-700 mt-2 text-sm">
                {{ Str::limit($product->description, 60) }}
            </p>
        </div>
    </div>
@endif
