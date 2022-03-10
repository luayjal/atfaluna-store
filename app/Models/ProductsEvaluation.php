<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsEvaluation extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','eval','review','status'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
