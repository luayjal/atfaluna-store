<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','email','phone','address','postcode',];
    public function order(){
        return  $this->hasMany(Order::class,'customer_id');
      }

      public function routeNotificationForWhatsApp()
        {
        return $this->phone;
        }
}
