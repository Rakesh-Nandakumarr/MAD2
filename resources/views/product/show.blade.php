<x-app-layout :metaTitle="$product->meta_title ?: $product->title" :metaDescription="$product->meta_description" :metaKeywords="$product->meta_keywords ?: $product->title">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200 mb-10">
                <div class="flex flex-wrap md:flex-nowrap space-x-0 md:space-x-5">
    <div class="w-full md:w-1/2">
        <img src="{{ asset($product->thumbnail) }}"
            class="w-full rounded-lg max-h-96 object-cover"
            alt="{{ $product->name }}">
    </div>

    <div class="w-full md:w-1/2 md:pl-5 mt-4 md:mt-0">
        <h1 class="text-2xl font-medium text-gray-900">
            {{ $product->name }}
        </h1>

        <span class="text-xs font-semibold text-gray-500 block mt-1">
            <a href="{{ route('category.show', $product->category->slug) }}">
                {{ $product->category->name }}
            </a>
        </span>

        <p class="mt-3 text-gray-500 leading-relaxed">
            {{ $product->description }}
        </p>

        <div class="mt-2">
            <span class="text-gray-500 text-lg">
                LKR {{ number_format($product->price, 2) }}
            </span>
        </div>

        <div class="mt-5">
            @livewire('ProductAddToCart', ['product' => $product])
        </div>
    </div>
</div>

            </div>


            <livewire:comments :model="$product" :has-purchased="$hasPurchased"/>

               <x-bottom-nav />
 
        </div>
    </div>
</x-app-layout>
