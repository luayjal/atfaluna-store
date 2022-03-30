<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['product_id','code_variant','price_variant','quantity_variant'];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function option(){
        return $this->hasMany(Variant_Option::class,'variants_id');
    }
    public function orderItem(){
        return $this->hasMany(OrderItem::class,'variant_id');
    }

}
