<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
    public function reviews ()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
    public function getAverageRatingAttribute()
    {
        if ($this->reviews->isNotEmpty()) {
            return round($this->reviews->avg('rating'), 1); // Return the rounded average
        }
        return 0; // Default to 0 if there are no reviews
    }
    public function Categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
