<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-5 text-right">
                        <a href="{{ route('dashboard.listings.create') }}" class="bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">Create new listing</a>
                    </div>
                    <table class="border-collapse border  border-slate-500 w-full">
                        <thead>
                            <tr>
                                <th class="p-3 text-left border border-slate-600">Image</th>
                                <th class="p-3 text-left border border-slate-600">Title</th>
                                <th class="p-3 text-left border border-slate-600">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listings as $listing)
                                <tr>
                                    <td class="p-3  border border-slate-700">
                                        <a href="{{ route('dashboard.listings.show', [$listing->id]) }}">
                                            <img src="{{ $listing->image_path }}" alt="image" class="w-32">
                                        </a>
                                    </td>
                                    <td class="p-3 border border-slate-700">
                                        <a href="{{ route('dashboard.listings.show', [$listing->id]) }}" class="hover:text-gray-300">Indianapolis</a>
                                    </td>
                                    <td class="p-3 border border-slate-700">{{ $listing->description }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
