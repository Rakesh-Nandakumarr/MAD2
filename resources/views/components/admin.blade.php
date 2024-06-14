<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

        <meta name="theme-color" content="#FCD299"/>
        <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
        <link rel="manifest" href="{{ asset('/manifest.json') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
    <div class="container-fluid">
        <div class="flex h-screen bg-gray-200">
            <div class="w-64 bg-white p-4 shadow-lg overflow-y-auto">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Admin Panel</h2>
                <nav>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-orange-500 hover:text-white hover:no-underline" href="/admin/dashboard">Dashboard</a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-orange-500 hover:text-white hover:no-underline" href="/admin/product">Products</a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-orange-500 hover:text-white hover:no-underline" href="/admin/product-category">Product Category</a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-orange-500 hover:text-white hover:no-underline" href="/admin/user">Users</a>
                    <a class="block py-2.5 px-4 rounded transition duration-200 hover:bg-orange-500 hover:text-white hover:no-underline" href="/admin/order">Orders</a>
                </nav>
            </div>
            <div class="flex-grow p-6 overflow-y-auto">
                @if (isset($header))
                <h2 class="text-xl font-semibold text-orange-700 mb-4">{{ $header }}</h2>
                @endif
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    

        @stack('modals')

        @livewireScripts
        <script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>
</body>
</html>
