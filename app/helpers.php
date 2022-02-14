<?php

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