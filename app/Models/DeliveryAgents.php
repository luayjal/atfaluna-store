<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAgents extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','user_id_image','car_form_image','address','car_body','car_model','driving_license'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
