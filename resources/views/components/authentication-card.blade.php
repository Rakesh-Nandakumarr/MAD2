<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100" style="background-image: url( {{ asset('img/v602_56.png') }} );">
    @if (isset($logo))
    <div class="mb-4">
        {{ $logo }}
    </div>
    @endif
    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg opacity-90">
        {{ $slot }}
    </div>
</div>
