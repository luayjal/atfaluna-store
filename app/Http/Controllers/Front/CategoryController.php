<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function products($slug){
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->paginate(12);
        return view('front.product',[
            'category' => $category,
            'products' =>  $products,
        ]);
    }
}
