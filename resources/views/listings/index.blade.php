<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
            <div class="flex justify-center">
                <img src="https://via.placeholder.com/900x200.png/006655?text=officia" alt="ad image" class="rounded-xl">
            </div>
        </article>
        <div class="lg:grid lg:grid-cols-6">
            @foreach($listings as $listing)
                <x-listing-card :listing="$listing">
                </x-listing-card>
            @endforeach
        </div>
        <div >
            {{ $listings->links('vendor.pagination.tailwind') }}
        </div>
    </main>
</x-layout>
