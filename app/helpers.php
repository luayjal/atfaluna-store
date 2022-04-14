<?php

use App\Models\Variant_Option;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

 function cart_id(){

    $id = Cookie::get('cart_id');

    if (!$id) {
        $id = Str::uuid();
        Cookie::queue('cart_id', $id, 60 * 24 * 30);
    }

    return $id;

};

function wishlist_id(){

    $id = Cookie::get('wishlist_id');

    if (!$id) {
        $id = Str::uuid();
        Cookie::queue('wishlist_id', $id, 60 * 24 * 30);
    }

    return $id;

};

function color($variant_id)
{
    $colour = Variant_Option::where('variants_id', $variant_id)
    ->where('option','color')->first();
    return $colour->value;
}
function size($variant_id)
{
    $size = Variant_Option::where('variants_id', $variant_id)
    ->where('option','size')->first();
    return $size->value;
}

function variant_code($variant_id)
{
    $size = Variant_Option::where('variants_id', $variant_id)
    ->where('option','size')->first();
    return $size->value;
}
