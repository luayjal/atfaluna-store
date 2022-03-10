<?php

namespace App\Http\Controllers\Front;

use App\Models\Slider;
use App\Models\AboutUs;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $sliders = slider::where('status','=','active')->latest()->get();
        $categories = Category::where('status','active')->whereDoesntHave('parent')->get();
        $products = Product::where('status','in-stock')->take(16)->get();
        $products_sums = DB::table('products')->select('id',
        DB::raw('(select sum(quantity_variant) from variants where variants.product_id =  products.id) as sum'))->where('status', 'in-stock')->latest()->take(16)->get();

        return view('front.index', [
            'sliders' => $sliders,
            'categories'=>$categories,
            'products'=>$products,
            'about_us'=> AboutUs::first(),
            'products_sums' => $products_sums
        ]);
    }

    public function latestProduct(){
        $products = Product::latest()->take(20)->get();
        return view('front.latest-product',[
            'products' => $products
        ]);
    }

}
