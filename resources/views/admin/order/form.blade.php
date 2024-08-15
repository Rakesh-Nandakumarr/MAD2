<x-admin>
    <h2 class="text-base font-semibold leading-7 text-orange-700">Create Orders</h2>
    <br>

    <div class="container mx-auto mt-1" x-data="{ useShippingAsBilling: true }">
        <div class="space-y-10 divide-y divide-gray-900/10">
            </div>

            <div class="shadow rounded">
                <form method="post"
                    @if($order->id)
                        action="{{ route('order.update', $order->id) }}"
                    @else
                        action="{{ route('order.store') }}"
                    @endif
                    class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    @csrf
                    @if ($order->id)
                        @method('PUT')
                    @endif

                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <!-- Shipping Details -->
<!-- Shipping Details -->
<div class="col-span-full">
    <h2 class="text-lg font-semibold leading-7 text-gray-900">Delivery Details</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
        <div>
            <label for="shipping_first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" id="shipping_first_name" name="shipping_first_name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_first_name', $order->shipping_first_name) }}">
        </div>
        <div>
            <label for="shipping_last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" id="shipping_last_name" name="shipping_last_name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_last_name', $order->shipping_last_name) }}">
        </div>
        <div class="col-span-full">
            <label for="shipping_address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="shipping_address" name="shipping_address" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_address', $order->shipping_address) }}">
        </div>
        <div>
            <label for="shipping_post_code" class="block text-sm font-medium text-gray-700">Post Code</label>
            <input type="text" id="shipping_post_code" name="shipping_post_code" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_post_code', $order->shipping_post_code) }}">
        </div>
        <div>
            <label for="shipping_city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" id="shipping_city" name="shipping_city" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_city', $order->shipping_city) }}">
        </div>
        <div>
            <label for="shipping_district" class="block text-sm font-medium text-gray-700">District</label>
            <input type="text" id="shipping_district" name="shipping_district" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_district', $order->shipping_district) }}">
        </div>
        <div>
            <label for="shipping_phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="shipping_phone" name="shipping_phone" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('shipping_phone', $order->shipping_phone) }}">
        </div>
    </div>
    <div class="col-span-full mt-4">
        <label for="shipping_status" class="block text-sm font-medium text-gray-700">Delivery Status</label>
        <select id="shipping_status" name="shipping_status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="pending" {{ old('shipping_status', $order->shipping_status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ old('shipping_status', $order->shipping_status) == 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="delivered" {{ old('shipping_status', $order->shipping_status) == 'delivered' ? 'selected' : '' }}>Delivered</option>
        </select>
    </div>
</div>



                            <!-- Toggle Button -->
                            <div class="col-span-full flex items-center mt-4">
                                <label for="toggle" class="block text-sm font-medium text-gray-700 mr-4">Use shipping details as billing details</label>
                                <div @click="useShippingAsBilling = !useShippingAsBilling"
                                    class="relative inline-flex items-center h-6 rounded-full w-11 cursor-pointer transition-colors duration-300 ease-in-out"
                                    :class="useShippingAsBilling ? 'bg-orange-600' : 'bg-gray-300'">
                                    <span class="sr-only">Toggle use shipping as billing</span>
                                    <span class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform duration-300 ease-in-out"
                                        :class="useShippingAsBilling ? 'translate-x-6' : 'translate-x-1'"></span>
                                </div>
                            </div>

                            <!-- Billing Details -->
<!-- Billing Details -->
<div x-show="!useShippingAsBilling" class="col-span-full mt-4">
    <h2 class="text-lg font-semibold leading-7 text-gray-900">Billing Details</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
        <div>
            <label for="billing_first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" id="billing_first_name" name="billing_first_name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_first_name', $order->billing_first_name) }}">
        </div>
        <div>
            <label for="billing_last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" id="billing_last_name" name="billing_last_name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_last_name', $order->billing_last_name) }}">
        </div>
        <div class="col-span-full">
            <label for="billing_address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="billing_address" name="billing_address" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_address', $order->billing_address) }}">
        </div>
        <div>
            <label for="billing_post_code" class="block text-sm font-medium text-gray-700">Post Code</label>
            <input type="text" id="billing_post_code" name="billing_post_code" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_post_code', $order->billing_post_code) }}">
        </div>
        <div>
            <label for="billing_city" class="block text-sm font-medium text-gray-700">City</label>
            <input type="text" id="billing_city" name="billing_city" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_city', $order->billing_city) }}">
        </div>
        <div>
            <label for="billing_district" class="block text-sm font-medium text-gray-700">District</label>
            <input type="text" id="billing_district" name="billing_district" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_district', $order->billing_district) }}">
        </div>
        <div>
            <label for="billing_phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="billing_phone" name="billing_phone" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('billing_phone', $order->billing_phone) }}">
        </div>

    </div>
</div>


                        </div>
                    </div>
                    <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit"
                            class="rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
