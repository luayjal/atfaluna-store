<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['image','content','insta','twitter','tiktok','mobile','email','address','return_policy'];
    public function getImageUrlAttribute()
    {
        return asset('uploads/'.$this->image);
    }
}
