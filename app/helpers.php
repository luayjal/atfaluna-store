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

