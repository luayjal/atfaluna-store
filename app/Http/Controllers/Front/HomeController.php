<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = slider::where('status','=','active')->latest()->get();

        return view('front.index', [
            'sliders' => $sliders,
        ]);
    }

    
}