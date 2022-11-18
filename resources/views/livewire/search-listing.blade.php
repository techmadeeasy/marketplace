
<div class="lg:py-3 lg:px-5">
    <input  type="search" placeholder="Search...." name="search" wire:model.debounce.1000ms="search"
            class="lg:bg-transparent w-80 py-2 lg:py-0 pl-4 focus-within:outline-none rounded-full">
        @if(count($results) > 0)
            <div class="flex absolute w-auto pt-4 bg-gray-200 border border-gray-300">
                <ul class="w-80 mx-auto px-3">
                    @foreach($results as $listing)
                        <li class="border-b border-gray-300 py-1">
                            <a href="{{ route('view-listing', [$listing->category->slug, $listing->slug]) }}">{{ $listing->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    <select name="" id="" wire:model="categoryId" class='border-gray-700 text-black  bg-gray-700 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
        <option value="">Category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
</div>
