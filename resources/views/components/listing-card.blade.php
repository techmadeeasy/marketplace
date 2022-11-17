<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl col-span-2">
    <div class="py-6 px-5">
        <div>
            <img src="{{ $listing->image_path }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="{{ route('listing-by-category', [$listing->category->slug]) }}" class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" style="font-size: 10px"> {{ $listing->category->title }}
                    </a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $listing->title }}
                    </h1>

                    <div class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $listing->created_at->diffForhumans() }}</time> By  <h5 class="font-bold">{{ $listing->user->name }}</h5>
                    </div>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ substr($listing->description, 0, 50) }}.....
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div>
                    <a href="{{ route('view-listing', [$listing->category->slug, $listing->slug]) }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
