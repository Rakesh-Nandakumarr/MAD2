
<x-app-layout>
<div class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-3xl font-bold mb-6 text-center">Order Form</h2>
        <form action="/orders" method="POST">
            <!-- Shipping Details -->
            <h3 class="text-xl font-semibold mb-4">Shipping Details</h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="shipping_first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="shipping_first_name" id="shipping_first_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="shipping_last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="shipping_last_name" id="shipping_last_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="shipping_address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="shipping_address" id="shipping_address" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="shipping_city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="shipping_city" id="shipping_city" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="shipping_post_code" class="block text-sm font-medium text-gray-700">Post Code</label>
                    <input type="text" name="shipping_post_code" id="shipping_post_code" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="shipping_mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                    <input type="text" name="shipping_mobile" id="shipping_mobile" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <!-- Billing Details -->
            <h3 class="text-xl font-semibold mt-6 mb-4">Billing Details</h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="billing_first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="billing_first_name" id="billing_first_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="billing_last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="billing_last_name" id="billing_last_name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="billing_address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="billing_address" id="billing_address" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="billing_city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="billing_city" id="billing_city" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="billing_post_code" class="block text-sm font-medium text-gray-700">Post Code</label>
                    <input type="text" name="billing_post_code" id="billing_post_code" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="billing_mobile" class="block text-sm font-medium text-gray-700">Mobile</label>
                    <input type="text" name="billing_mobile" id="billing_mobile" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <!-- Payment and Shipping Details -->
            <h3 class="text-xl font-semibold mt-6 mb-4">Payment and Shipping</h3>
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="payment_method" class="block text-sm font-medium text-gray-700">Payment Method</label>
                    <input type="text" name="payment_method" id="payment_method" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="delivery_method" class="block text-sm font-medium text-gray-700">Delivery Method</label>
                    <input type="text" name="delivery_method" id="delivery_method" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label for="total" class="block text-sm font-medium text-gray-700">Total</label>
                    <input type="number" step="0.01" name="total" id="total" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md shadow-md hover:bg-blue-600 transition duration-300">
                    Submit Order
                </button>
            </div>
        </form>
    </div>
</div>
</html>

</x-app-layout>