<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        $sliders = slider::where('status','=','active')->latest()->get();
        $categories = Category::where('status','active')->whereDoesntHave('parent')->get();
        $products = Product::where('status','in-stock')->take(16)->get();

        return view('front.index', [
            'sliders' => $sliders,
            'categories'=>$categories,
            'products'=>$products
        ]);
    }

    public function latestProduct(){
        $products = Product::latest()->take(20)->get();
        return view('front.latest-product',[
            'products' => $products
        ]);
    }

}
