<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where([
            'wishlist_id' => wishlist_id(),
        ])->get();
        return view('front.wishlist',['wishlists'=>$wishlists]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $wishlist_id = wishlist_id();     
        $product_id = $request->post('product_id');
        $wishlist = Wishlist::where([
            'wishlist_id' => $wishlist_id,
            'product_id' =>  $product_id,
        ])->first();

        if ($wishlist) {
            
            

        } else {
            $wishlist = Wishlist::create([
                'user_id' => Auth::id(),
                'wishlist_id' => $wishlist_id,
                'product_id' => $request->post('product_id'),
            ]);
         }
         $wishlist = Wishlist::where([
            'wishlist_id' => wishlist_id(),
        ])->get();
         return response()->json(['wishlist'=>$wishlist,'count'=>$wishlist->count()]);
}
}