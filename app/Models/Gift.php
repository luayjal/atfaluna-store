<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{

    use HasFactory;
    protected $table = "coupons";
    protected $fillable = ['title','details','code','product_id','status','type_table','cover_image'];
    protected $appends = ['image_url'];
     protected static function booted()
     {
         static::addGlobalScope('gift',function(Builder $query){
            $query->where('type_table','gift');
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
     protected  function product()
     {
        return $this->belongsTo(Product::class);
     }
}
