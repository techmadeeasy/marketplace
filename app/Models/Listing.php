<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(ListingCategory::class, 'category_id');
    }


    public function scopeTitle($query, $term){
        if ($term){
            $query->where('title', 'like', '%'. $term . '%');
        }
    }


    public function scopeCategory($query, $category=false){
        if ($category){
            $query->where('category_id', '=', $category);
        }
    }
}
