<x-admin>
<div class="container mx-auto mt-1">
    <div class="space-y-10 divide-y divide-gray-900/10">

        <div class="px-4 sm:px-0">
            @if(isset($productCategory) && $productCategory->id)
                <h2 class="text-base font-semibold leading-7 text-orange-700">
                    Update Product Category
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Update the product category details.
                </p>
            @else
                <h2 class="text-base font-semibold leading-7 text-orange-700">
                    Create Product Category
                </h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">
                    Create a new product category.
                </p>
            @endif
        </div>

        <div class="shadow rounded">
            <form method="post"
                @if(isset($productCategory) && $productCategory->id)
                    action="{{ route('product-category.update', $productCategory->id) }}"
                @else
                    action="{{ route('product-category.store') }}"
                @endif
                class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                
                @csrf
                @if (isset($productCategory) && $productCategory->id)
                    @method('PUT')
                @endif

                <div x-data="{
                    name: '{{ old('name', $productCategory->name ?? '') }}',
                    slug: '{{ old('slug', $productCategory->slug ?? '') }}',
                    init() {
                        this.$watch('name', value => {
                            this.slug = value.toLowerCase().replace(/ /g, '-');
                        });
                    }
                }">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                                    Name
                                </label>
                                <div class="mt-2">
                                    <input id="name" name="name" type="text" x-model="name"
                                        class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Name of the product category.
                                </p>
                                @error('name')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">
                                    Slug
                                </label>
                                <div class="mt-2">
                                    <input id="slug" name="slug" type="text" x-model="slug"
                                        class="px-3 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-orange-600 sm:text-sm sm:leading-6" required />
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-600">
                                    Slug for the product category.
                                </p>
                                @error('slug')
                                    <p class="mt-3 text-sm leading-6 text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <a href="{{ route('product-category.index') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                        <button type="submit"
                            class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Save</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
</x-admin>
