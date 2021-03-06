<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['product_id',
    'gift_id',
    'variant_id',
    'quantity',
     'price',
    'total'];
    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function gift(){
        return $this->belongsTo(Gift::class,'gift_id');
    }
    public function variant(){
        return $this->belongsTo(Variant::class,'variant_id');
    }
}
