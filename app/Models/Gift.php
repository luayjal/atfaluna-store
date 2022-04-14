<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{

    use HasFactory;
    protected $table = "coupons";
    protected $fillable = ['title','details','code','status','type_table','cover_image','price'];
    protected $appends = ['image_url'];
     protected static function booted()
     {
         static::addGlobalScope('gift',function(Builder $query){
            $query->where('type_table','gift');
         });
         parent::boot();

         static::deleting(function($gift) { // before delete() method call this
              $gift->carts()->delete();
              // do the rest of the cleanup...
         });

     }

     public function scopeActive($query)
     {
         $query->where('status', 'active');
     }
     public function getImageUrlAttribute()
    {
        return asset('uploads/'.$this->cover_image);
    }
     protected  function carts()
     {
        return $this->hasMany(Cart::class,'gift_id');
     }
}
