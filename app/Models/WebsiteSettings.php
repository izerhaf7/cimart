<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSettings extends Model
{
    use HasFactory;
    protected $table = 'website_settings';
    protected $guarded = [];
    public $timestamps = false;


    public function person(){
        return $this->hasMany(WebsitePerson::class, 'website_setting_id');
    }
}
