<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $fillable = ['image','content','insta','twitter','tiktok','mobile','email'];
    protected $guarded = ['_token'];
    public function getImageUrlAttribute()
    {
        return asset('uploads/'.$this->image);
    }
}
