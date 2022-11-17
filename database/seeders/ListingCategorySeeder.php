<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('listing_categories')->insert(
            [
                ['title'=>'Furniture', 'slug'=>'furniture'],
                ['title'=>'Electronics', 'slug'=>'electronic'],
                ['title'=>'Cars', 'slug'=>'cars'],
                ['title'=>'Property', 'slug'=>'property'],
            ]
        );
    }
}
