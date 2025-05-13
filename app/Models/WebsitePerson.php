<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsitePerson extends Model
{
    use HasFactory;
    protected $table = "website_person";
    protected $guarded = [];
    public $timestamps = false;

}
