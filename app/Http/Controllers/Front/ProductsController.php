<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Variant_Option;

class ProductsController extends Controller
{
    public function prdoductDetails($slug){
        $product = Product::with('evaluation')->where('slug',$slug)->first();
      // return $product->variants[0]->option;
      $variants = Variant::where('product_id', $product->id)->get();
      $sizes = Variant_Option::whereRaw('variants_id in (select id from variants where product_id = ?)', [$product->id])
          ->where('option', 'size')->distinct()
          ->get('value');

          $colors = Variant_Option::whereRaw('variants_id in (select id from variants where product_id = ?)', [$product->id])
          ->where('option', 'color')->distinct()
          ->select('value')->get();

        /*   $variant = Variant::where('product_id', $product->id)
          ->whereRaw('id in (select variants_id from variant__options where value = ?)', ['اسود']) //color
          ->whereRaw('id in (select variants_id from variant__options where value = ?)', ['l']) //size
          ->first();
          return   $variant->price_variant; */
        $related_products = Product::where('id','<>',$product->id)->where('category_id' , $product->category_id)->take(8)->get();



        return view('front.product-detail',[
            'product' => $product,
            'colors'=>$colors
            ,'sizes'=>$sizes,
            'variants'=>$variants,
            'related_products' => $related_products,
        ]);
    }
}
