<x-admin>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

    <div class="bg-white shadow-md rounded mb-6">
        <div class="px-6 py-4 font-bold text-lg border-b border-gray-200">
            Low Stock Products
        </div>
        <ul class="px-6 py-4">
            @foreach($low_stock_products as $product)
                <li class="mb-2 flex justify-between items-center">
                    <div class="flex gap-1"><div class="text-blue-500">{{ $product->name }}</div> with a stock level of only<div class="text-red-500"> {{ $product->stock }}</div></div>
                    <div>
                        <a href="{{ route('product.show', $product) }}" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Show</a>
                        <a href="{{ route('product.edit', $product) }}" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                        <form action="{{ route('product.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="bg-white shadow-md rounded mb-6">
        <div class="px-6 py-4 font-bold text-lg border-b border-gray-200">
            Inactive Products
        </div>
        <ul class="px-6 py-4">
            @foreach($inactive_products as $product)
                <li class="mb-2 flex justify-between items-center">
                    {{ $product->name }}
                    <div>
                        <a href="{{ route('product.show', $product) }}" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Show</a>
                        <a href="{{ route('product.edit', $product) }}" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                        <form action="{{ route('product.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

   <div class="bg-white shadow-md rounded mb-6">
    <div class="px-6 py-4 font-bold text-lg border-b border-gray-200">
        Categories With No Products
    </div>
    <ul class="px-6 py-4">
        @foreach($categories_with_no_products as $category)
            <li class="mb-2 flex justify-between items-center">
                {{ $category->name }}
                <div>
                    <a href="{{ route('product-category.edit', $category) }}" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>
                    <form action="{{ route('product-category.destroy', $category) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
</div>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <form action="/post-test" method="POST">
                    @csrf
                    <input type="text"
                            name="name"
                            placeholder="Name">
                    <input type="email"
                            name="email"
                            placeholder="Email">
                    <button type="submit">Save</button>
                </form>



            </div>
        </div>
    </div> -->

</x-admin>
