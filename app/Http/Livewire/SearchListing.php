<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\ListingCategory;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class SearchListing extends Component
{
    public $results = array();
    public $search;
    public $categories;
    public $categoryId = '';

    public function boot()
    {
        $this->categories = Cache::get('listingCategories', function (){
            return ListingCategory::all();
        });
    }

    public function updatedSearch($search)
    {
       $search ?
           $this->results = Listing::latest()->title($search)
               ->category($this->categoryId)->get() : $this->resetExcept('categories');
    }


    public function updatedCategoryId($categoryId)
    {
       $this->results = Listing::latest()->title($this->search)
               ->category($categoryId)->get();
    }

    public function render()
    {
        return view('livewire.search-listing');
    }
}
