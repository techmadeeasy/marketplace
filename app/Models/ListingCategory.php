<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function listing()
    {
        return $this->hasMany(Listing::class);
    }
}
