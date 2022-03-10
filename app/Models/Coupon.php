<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['code','type','discount_value','use_time',
      'used_time','start_date','expire_date','status','greater_than'];

      protected static function booted()
     {
         static::addGlobalScope('coupon',function(Builder $query){
            $query->where('type_table','coupon');
         });
     }
}
