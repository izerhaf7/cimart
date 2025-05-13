<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
