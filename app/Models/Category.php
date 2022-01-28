<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;  use SoftDeletes;

    protected $fillable = ['name','parent_id','image','slug','background_color','font_color','status'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')->withDefault([
            'name' => 'No Parent'
        ]);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
