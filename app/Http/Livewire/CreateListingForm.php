<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\ListingCategory;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateListingForm extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $categoryId;
    public $price;
    public $categories;
    public $image;
    public $publicationDate;


    public function rules()
    {
        return [
            'title' => 'required|min:6',
            'description' => 'required|max:500',
            'categoryId' => ['required','integer'], //TODO add custom validation to check for existing category ID e.g: $this->categories->pluck('id')->all()
            'publicationDate' => 'required|date_format:Y-m-d|after:yesterday',
            'price' => 'required|integer|max_digits:10',
            'image' => 'required|file|max:5000|image:jpg,png'
        ];
    }

    public function boot()
    {
        $this->categories = Cache::get('listingCategories', function (){
            return ListingCategory::all();
        });
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $slug = str_replace(' ', '-', strtoupper($this->title)) . time();
        $this->image->storeAs('public/images', $slug . '.' . $this->image->getClientOriginalExtension());
        $listing = Listing::create([
           'title'=> $this->title,
            'user_id' => auth()->id(),
            'slug' => $slug,
            'description' => $this->description,
            'category_id' => $this->categoryId,
            'image_path' => '/storage/images/' .  $slug . '.' . $this->image->getClientOriginalExtension(),
            'publication_date' => $this->publicationDate,
            'price' => floatval($this->price)
        ]);

        session()->flash('message', 'New listing created!');
        $this->resetExcept('categories');
    }

    public function render()
    {
        return view('livewire.create-listing-form');
    }
}
