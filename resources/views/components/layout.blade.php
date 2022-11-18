<!doctype html>
<html lang="eng">
    <head>
        <title>{{ env('APP_NAME') }}</title>
        {{--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="{{ asset('/assets/img/default-monochrome-black.svg') }}" alt="My Logo" width="165" height="16">
                </a>
            </div>


            <div class="flex items-center">
                @auth()
                    <a href="{{ route('dashboard.listings.index') }}" class="font-bold uppercase">Dashboard</a>
                @endauth
                @guest()
                    <a href="{{ route('login') }}" class="font-bold uppercase">Login</a> |
                    <a href="{{ route('register') }}" class="font-bold uppercase">Register</a>
                @endguest
                <livewire:search-listing/>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <h5 class="text-3xl">Sell it, you won't miss it</h5>
            <p class="text-sm mt-3">We promise to make the process enjoyable</p>
        </footer>
    </section>
    @livewireScripts
    </body>
</html>
