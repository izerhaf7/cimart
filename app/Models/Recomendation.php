<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomendation extends Model
{
    use HasFactory;
    protected $table = 'recomendation';
    protected $guarded = [];
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

}
