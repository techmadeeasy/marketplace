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


    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false){
            $query->where('title', 'like', '%'. request('search') . '%')
                ->orWhere('body', 'like', '%'. request('search') . '%');
        }
    }
}
