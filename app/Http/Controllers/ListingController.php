<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingCategory;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        return view('listings.index', [
            'listings' => Listing::with('user', 'category')->latest()->paginate(5)
        ]);
    }

    public function show($categorySlug, Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing->load(['user', 'category'])
        ]);
    }

    public function showByCategory(ListingCategory $category)
    {
        $listings = $category->listings;
        return view('listings.index', [
            'listings' => $listings->load(['user', 'category'])
        ]);
    }
    public function search(Request $request)
    {
        return [];
    }
}
