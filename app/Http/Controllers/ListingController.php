<?php

namespace App\Http\Controllers;

use App\Models\Listing;
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

    public function view(Listing $listing)
    {
        return view('listings.index', [
            'listing' => $listing
        ]);
    }

    public function search(Request $request)
    {
        return [];
    }
}
