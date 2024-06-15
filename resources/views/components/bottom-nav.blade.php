

    <!-- Bottom Navigation Bar -->
    <div class="fixed inset-x-0 bottom-0 bg-white shadow-lg border-t border-gray-200 sm:hidden">
        <div class="flex justify-around">
            <a href="/" class="w-full py-2.5 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 12l9-9 9 9-1.5 1.5L12 4.5 4.5 13.5z"/>
                    <path d="M12 4.5L4.5 13.5H9v6h6v-6h4.5z"/>
                </svg>
                <span class="block text-xs mt-1">Home</span>
            </a>
            <a href="/menu" class="w-full py-2.5 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
                </svg>
                <span class="block text-xs mt-1">Menu</span>
            </a>
            <a href="/cart" class="w-full py-2.5 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.34 2M7 13h10l1.24-4.68A2 2 0 0016.31 6H7.41l-.34-2H3m1 4h14.31l-1.24 4.68A2 2 0 0114.71 14H8.24m-1.48 4H16m-8 0a2 2 0 102 2H6.75a2 2 0 10-2-2z"/>
                </svg>
                <span class="block text-xs mt-1">My Cart</span>
            </a>
            <a href="/orders" class="w-full py-2.5 text-center transition duration-300 ease-in-out transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m0-2a7 7 0 11-14 0a7 7 0 0114 0z"/>
                </svg>
                <span class="block text-xs mt-1">My Orders</span>
            </a>
            @livewire("CartStatusmobile")


        </div>
    </div>

