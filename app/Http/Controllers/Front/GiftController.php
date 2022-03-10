<?php

namespace App\Http\Controllers\Front;

use App\Models\Gift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiftController extends Controller
{
    public function gifts(){
        $gifts = Gift::active()->get();
    return view('front.gifts',['gifts'=>$gifts]);
    }
    public function giftDetails($id){
        $gift = Gift::active()->findOrFail($id);
        return view('front.gift-detail',['gift'=>$gift]);
    }
}
