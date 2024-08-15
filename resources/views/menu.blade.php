<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12" x-data="{ search: '' }">
        <div class="px-4 sm:px-6 lg:px-8 mx-auto md:w-full md:max-w-3xl">
            <h1 class="font-bold text-center text-4xl mb-10">Menu</h1>
            
            <!-- Search Bar -->
            <div class="mb-6">
                <input 
                    type="text" 
                    placeholder="Search for products..." 
                    class="w-full p-4 text-gray-900 bg-white rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    x-model="search"
                />
            </div>

            <div class="bg-white shadow-lg rounded-lg divide-y divide-gray-200 overflow-hidden">
                @foreach($categories as $category)
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">{{ $category->name }}</h2>
                        
                        <div class="block sm:hidden">
                            <!-- Mobile List View -->
                            <ul class="divide-y divide-gray-200">
                                @foreach($category->products as $product)
                                    @if($product->status)
                                        <li class="flex py-6" x-show="search === '' || '{{ $product->name }}'.toLowerCase().includes(search.toLowerCase())">
                                            @if($product->thumbnail)
                                                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover rounded-lg">
                                            @endif
                                            <div class="ml-4 flex flex-col justify-between">
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                                    <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                                </div>
                                                <div class="mt-4">
                                                    <p class="text-lg font-bold text-gray-900">{{ number_format($product->price, 2) }} $</p>
                                                    <a href="{{ route('productshow', $product->slug) }}" class="text-blue-600 hover:underline">View Details</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="hidden sm:block">
                            <!-- Desktop Card View -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($category->products as $product)
                                    @if($product->status)
                                        <a href="{{ route('productshow', $product->slug) }}" class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col" x-show="search === '' || '{{ $product->name }}'.toLowerCase().includes(search.toLowerCase())">
                                            @if($product->thumbnail)
                                                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                            @endif
                                            <div class="p-4 flex-grow">
                                                <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                                                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                                <p class="text-lg font-bold text-gray-900 mt-4">{{ number_format($product->price, 2) }} $</p>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-bottom-nav />
</x-app-layout>
