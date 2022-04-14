<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory; use SoftDeletes;
    protected $fillable = ['code','name', 'slug', 'category_id','certificate','description','description_size','img_description_size','image', 'price','discount_price','quantity', 'status'];
    protected $appends = ['image_url','certificate_url','final_price'];
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
    public function advertising(){
        return $this->hasOne(Advertising::class);
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
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id', 'id');
    }

    public function variants(){
        return $this->hasMany(Variant::class,'product_id');
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class,'product_id');
    }
    public function evaluation(){
        return $this->hasMany(ProductsEvaluation::class,'product_id');
    }

    public function isinwishlist($prdouct_id)
    {
        $p = Wishlist::where('product_id',$prdouct_id)->where('wishlist_id',wishlist_id())->first();
        if ($p) {
            return true;
        } else {
            return false;
        }

    }
    public function getImageUrlAttribute()
    {
        return asset('uploads/'.$this->image);
    }

    public function getImageDiscAttribute()
    {
        return asset('uploads/'.$this->img_description_size);
    }
    public function getCertificateUrlAttribute()
    {
        return asset('uploads/'.$this->certificate);
    }
    public function getFinalPriceAttribute(){
        if ($this->discount_price > 0) {
            $price = $this->discount_price;
            return $price;
        } else {
            $price = $this->price;
            return $price;
        }

    }
}
