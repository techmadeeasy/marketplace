<!doctype html>

<title>{{ env('APP_NAME') }}</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
                <a href="{{ route('dashboard') }}" class="text-xs font-bold uppercase">Dashboard</a>
            @endauth
            <form method="POST" action="#" class="lg:flex text-sm">
                <div class="lg:py-3 lg:px-5 flex items-center">
                    <input  type="text" placeholder="Search...." name="search"
                           class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-black hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                   Search
                </button>
            </form>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        @guest()
            <div>
                <a href="{{ route('login') }}" class="text-xs font-bold uppercase">Login</a> |
                <a href="{{ route('register') }}" class="text-xs font-bold uppercase">Register</a>
            </div>
        @endguest
        <h5 class="text-3xl">Sell it, you won't miss it</h5>
        <p class="text-sm mt-3">We promise to make the process enjoyable</p>
    </footer>
</section>
</body>
