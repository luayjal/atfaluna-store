<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryEvaluation extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','delivery_id','eval','review','status'];

    public function delivery(){
        return $this->belongsTo(DeliveryAgents::class);
    }
}
