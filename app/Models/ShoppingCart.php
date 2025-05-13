<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "shopping_cart";

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
