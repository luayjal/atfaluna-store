<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart_id = cart_id();
        $carts = Cart::where([
            'cart_id' => $cart_id,
        ])->get();
        $totalPrice = $carts->sum(function($item)
        {
            return $item->product->price * $item->quantity;
        });      
        
        return view('front.cart',['carts'=>$carts,'totalPrice'=>$totalPrice]);
    }


    
    public function store(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'int|min:1',
        ]);

        $cart_id = cart_id();
        $product = Product::findOrFail($request->post('product_id'));
        $product_id = $request->post('product_id');
        $quantity = $request->post('quantity', 1);
        $color_id = $request->post('color_id');
        $size_id = $request->post('size_id');

        $cart = Cart::where([
            'cart_id' => $cart_id,
            'product_id' =>  $product_id,
            'color_id' => $color_id,
            'size_id'=> $size_id
        ])->first();

        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'cart_id' => $cart_id,
                'product_id' => $request->post('product_id'),
                'quantity' => $request->post('quantity', 1),
                'color_id' => $color_id,
                'size_id'=> $size_id
            ]);

        }
        $carts = Cart::where([
            'cart_id' => cart_id(),
        ])->get();
        $totalPrice = $carts->sum(function($item)
        {
            return $item->product->price * $item->quantity;
        }); 
        $data = [
            'cart' =>$cart,
            'count' => $cart->count(),
            'product' => $product,
            'totalPrice'=>$totalPrice

        ];
         return response()->json($data, 200);
  }

        public function update_quantity(Request $request)
        {
            $cart =  Cart::with('product')->where('product_id',$request->id)->where('cart_id', cart_id())->first();
            $cart->quantity=$request->quantity;
            $cart->save();
            
            $carts = Cart::where([
                'cart_id' => cart_id(),
            ])->get();
            $totalPrice = $carts->sum(function($item)
            {
                return $item->product->price * $item->quantity;
            }); 
            
            return response()->json(['cart'=>$cart,'totalPrice'=>$totalPrice]);
        }
        
}