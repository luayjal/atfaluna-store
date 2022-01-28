<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory; use SoftDeletes;
    protected $fillable = ['name', 'slug', 'category_id','certificate','description','image', 'price','sale_price','quantity', 'status'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    public function colors(){
        return $this->belongsToMany(Color::class,'color_product','product_id','color_id');
    }
    public function sizes(){
        return $this->belongsToMany(Size::class,'product_size','product_id','size_id');
    }
    /**
     * Get all of the cart for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
    public function getImageUrlAttribute()
    {
        return asset('uploads/'.$this->image);
    }
}
