<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function Items(){
      return  $this->hasMany(OrderItem::class,'order_id');
    }
    public function customer(){
      return  $this->belongsTo(Customer::class,'customer_id');
    }
  //  protected $dateFormat = 'U';
}
