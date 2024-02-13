<x-app-layout>
    <form action="{{ route('product-category.store') }}" method="post" class="max-w-lg mx-auto bg-white p-8 shadow-md rounded-md mt-8">

        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
            <input id="name" class="mt-1 p-3 w-full border rounded-md focus:outline-none focus:border-orange-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-600">Link:</label>
            <input id="slug" class="mt-1 p-3 w-full border rounded-md focus:outline-none focus:border-orange-500" type="text" name="slug" :value="old('slug')" required autofocus autocomplete="slug" />
        </div>

        <button type="submit" class="w-full bg-orange-500 text-white p-3 rounded-md hover:bg-orange-600 focus:outline-none focus:shadow-outline-orange active:bg-orange-800">
            Save
        </button>
    </form>
</x-app-layout>
