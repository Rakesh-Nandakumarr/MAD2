<!-- resources/views/admin/product/form.blade.php -->

<x-admin>
    <x-slot name="header">
        {{ isset($product->id) ? 'Edit Product' : 'Create Product' }}
    </x-slot>

    <div class="container mx-auto mt-1 bg-white p-4 shadow rounded">
        <div class="px-4 sm:px-6 lg:px-8 bg-white pt-4">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 mb-5" role="alert">
                    <strong class="font-bold">Whoops!</strong>
                    <span class="block sm:inline">There were some problems with your input.</span>
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($product->id) ? route('product.update', $product->id) : route('product.store') }}" method="POST" enctype="multipart/form-data" x-data="{ name: '{{ old('name', $product->name) }}', slug: '{{ old('slug', $product->slug) }}' }" x-init="$watch('name', value => slug = value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, ''))">
                @csrf
                @if (isset($product->id))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" autocomplete="name" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" x-model="name" required>
                    </div>

                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                        <input type="text" name="slug" id="slug" autocomplete="slug" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" x-model="slug" required>
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                        <select id="category_id" name="category_id" autocomplete="category_id" class="mt-1 block w-full py-2  border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="3" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700">stock</label>
                        <input type="number" name="stock" id="stock" autocomplete="stock" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="{{ old('stock', $product->stock) }}" required>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" step="0.01" name="price" id="price" autocomplete="price" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="{{ old('price', $product->price) }}" required>
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" autocomplete="status" class="mt-1 block w-full py-2  border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                            <option value="1" {{ old('status', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div></div>

                    <div class="sm:col-span-2">
                        <label class="block text-lg font-medium text-gray-700 pt-10">SEO fields</label>
                    </div>

                    <div>
                        <label for="meta_title" class="block text-sm font-medium text-gray-700">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title" autocomplete="meta_title" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="{{ old('meta_title', $product->meta_title) }}">
                    </div>

                    <div>
                        <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                        <input type="text" name="meta_description" id="meta_description" autocomplete="meta_description" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="{{ old('meta_description', $product->meta_description) }}">
                    </div>

                    <div>
                        <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                        <input type="text" name="meta_keywords" id="meta_keywords" autocomplete="meta_keywords" class="mt-1 block w-full py-2  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="thumbnail" class="block text-sm font-medium text-gray-700">Featured Image</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="mt-1 block w-full">
                        @if(isset($product->id) && $product->thumbnail)
                            <img src="{{ asset($product->thumbnail) }}" alt="Thumbnail" class="mt-2 h-20">
                        @endif

                    </div>

                    <!-- <div class="sm:col-span-2">
                        <label for="featured_image" class="block text-sm font-medium text-gray-700">Featured Image</label>
                        <input type="file" name="featured_image" id="featured_image" class="mt-1 block w-full">
                        @if(isset($product->id) && $product->getFirstMediaUrl('featured_image'))
                                                        <img src="{{ $product->getFirstMediaUrl('featured_image') }}" alt="Featured Image" class="mt-2 h-20">
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <label for="gallery" class="block text-sm font-medium text-gray-700">Gallery</label>
                        <input type="file" name="gallery[]" id="gallery" class="mt-1 block w-full" multiple>
                        @if(isset($product->id))
                            <div class="mt-2 flex space-x-4">
                                @foreach($product->getMedia('gallery') as $image)
                                    <img src="{{ $image->getUrl() }}" alt="Gallery Image" class="h-20">
                                @endforeach
                            </div>
                        @endif
                    </div> -->
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        {{ isset($product->id) ? 'Update Product' : 'Create Product' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin>
