<?php

use function Livewire\Volt\{state, mount, on};

state([
    'cart' => null,
    'showCart' => false,
]);

mount(function () {
    if (auth()->user()) {
        $cart = auth()
            ->user()
            ->carts()
            ->where('is_paid', false)
            ->first();

        $this->cart = $cart;
    }

});

$removeProduct = function ($productId) {
    $cart = $this->cart;

    $cart->products()->detach($productId);

    // calculate the total price of the cart
    $cart->total = $cart->products->sum(function ($product) {
        return $product->pivot->price * $product->pivot->quantity;
    });

    $cart->save();

    $this->cart = $cart;
};

on(['cartRefresh' => function () {
    if (auth()->user()) {
        $cart = auth()
            ->user()
            ->carts()
            ->where('is_paid', false)
            ->first();

        $this->cart = $cart;

        $this->showCart = true;
    }
}]);
?>

<div>
    <div class="relative" x-data="{ open: @entangle('showCart') }">
    <div x-show="open" @click.away="open = false"
         class="absolute right-0 mb-2 origin-bottom-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none bottom-0 top-auto w-60 mr-3">
        <div class="p-4">
            <h3 class="text-lg font-medium text-gray-900">Cart</h3>
            <div class="mt-4">
                <div class="items-center space-y-6">
                    @if($cart)
                        @foreach($cart->products as $product)
                            <div class="flex items-center">
                                <img src="{{ $product->thumbnail }}"
                                     class="w-10 h-10 object-cover rounded">
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">{{ $product->name }}</h4>
                                    <p class="mt-1 text-sm text-gray-500">{{ $product->pivot->quantity }} x
                                        LKR {{ number_format($product->price, 2) }}
                                    </p>
                                </div>
                                <button wire:click="removeProduct({{ $product->id }})"
                                        class="ml-auto text-gray-500 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                        <div class="flex gap-5">
                            <p class="ml-auto text-sm font-semibold text-gray-800">
                                LKR {{ number_format($cart->total, 2) }}
                            </p>
                            <a href="/cart" class="text-sm font-semibold text-orange-800">
                                View Cart
                            </a>
                        </div>
                    @else
                        <p class="text-sm text-gray-500">No items in the cart</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>

</div>
