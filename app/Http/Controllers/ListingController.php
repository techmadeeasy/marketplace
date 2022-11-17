<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ListingCategory;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::latest()->filter(request(['search']));
        return view('listings.index', [
            'listings' => $listings->with('user', 'category')->get()
        ]);
    }

    public function show($categorySlug, Listing $listing)
    {
        return view('listings.view', [
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
