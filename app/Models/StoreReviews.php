<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreReviews extends Model
{
    use HasFactory;
    protected $fillable = ['rating','review','name','email','phone'];
    protected $appends = ['avatar'];
    public function getAvatarAttribute()
    {
        return "https://ui-avatars.com/api/?name=$this->name&background=random&color=fff";
    }
}
