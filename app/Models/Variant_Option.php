<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant_Option extends Model
{
    protected $fillable = ['variants_id','option','value'];

    use HasFactory;

    public function option(){
        return $this->belongsTo(Variant::class,'variants_id');
    }
}
