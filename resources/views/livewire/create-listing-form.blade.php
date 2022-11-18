<div>
    <form wire:submit.prevent="submit">
        <div>
            @if (session()->has('message'))
                <div class="text-center text-gray-800 bg-gray-100 py-16 w-3/4 mb-6">
                    {{ session('message')}}
                </div>
            @endif
            <div>
                <label class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    <input type="text" wire:model.lazy="title" class='border-gray-300 dark:border-gray-700 w-3/4 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' placeholder="Title">
                    @error('title') <div> <span class="dark:text-red-400 pl-2">{{ $message }}</span> </div> @enderror
                </label>
            </div>
            <div>
                <label class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    <textarea type="text" wire:model="description" class='border-gray-300 dark:border-gray-700 w-3/4 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' placeholder="Description"></textarea>
                    @error('description') <div> <span class="dark:text-red-400 pl-2">{{ $message }}</span> </div> @enderror
                </label>
            </div>
            <div>
                <label class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
                    <select name="" id="" wire:model.debounce.500ms="categoryId" class='border-gray-300 dark:border-gray-700 w-3/4 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'>
                        <option value="">Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    @error('categoryId') <div> <span class="dark:text-red-400 pl-2">{{ $message }}</span> </div> @enderror
                </label>
            </div>
            <div>
                <label class='block font-medium text-sm text-gray-700 dark:text-gray-300 mt-3'>
                    <input type="file" wire:model.lazy="image" class='border-gray-300 dark:border-gray-700 w-3/4 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' placeholder="Title">
                    @error('image') <div> <span class="dark:text-red-400 pl-2">{{ $message }}</span> </div> @enderror
                </label>
            </div>
            <div>
                <label class='block font-medium text-gray-700 dark:text-gray-300 mt-3'>
                    Publish on
                    <div>
                        <input type="date" wire:model.lazy='publicationDate' class='border-gray-300 dark:border-gray-700 w-3/4 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' placeholder="Title">
                        @error('publicationDate') <div> <span class="dark:text-red-400 pl-2">{{ $message }}</span> </div> @enderror
                    </div>
                </label>
            </div>
            <div>
                <label class='block font-medium text-gray-700 dark:text-gray-300 mt-3'>
                    <div>
                        <input type="number" wire:model.lazy='price'  class='border-gray-300 dark:border-gray-700 w-3/4 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm' placeholder="Price">
                        @error('price') <div> <span class="dark:text-red-400 pl-2">{{ $message }}</span> </div> @enderror
                    </div>
                </label>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">Create new listing</button>
            </div>
        </div>
    </form>
</div>
