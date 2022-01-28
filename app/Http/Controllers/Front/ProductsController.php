<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function prdoductDetails($slug){
        $product = Product::where('slug',$slug)->first();
        $related_products = Product::where('id','<>',$product->id)->where('category_id' , $product->category_id)->take(8)->get();
        return view('front.product-detail',[
            'product' => $product,
            'related_products' => $related_products,
        ]);
    }
}
