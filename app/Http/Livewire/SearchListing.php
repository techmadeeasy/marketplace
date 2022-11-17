<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;

class SearchListing extends Component
{
    public $results = array();
    public $search;

    public function updatedSearch($search)
    {
        $this->results = Listing::latest()->filter($search)->with('category')->get();
    }

    public function render()
    {
        return view('livewire.search-listing');
    }
}
