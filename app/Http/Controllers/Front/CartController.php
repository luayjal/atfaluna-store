<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\City;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use App\Models\Variant_Option;
use App\Http\Controllers\Controller;
use App\Rules\QuantityValidate;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cities = City::get();
        $cart_id = cart_id();
        $carts = Cart::where([
            'cart_id' => $cart_id,
        ])->get();
        $totalPrice = $carts->sum(function ($item) {
            return $item->product->final_price * $item->quantity;
        });

        return view('front.cart', ['carts' => $carts, 'totalPrice' => $totalPrice, 'cities' => $cities]);
    }



    public function store(Request $request)
    {

        $cart_id = cart_id();
        $product = Product::findOrFail($request->post('product_id'));
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'required',
            'size' => 'required',
        ], [
            'color.required' => 'حدث خطأ! الرجاء اختيار اللون',
            'size.required' => 'حدث خطأ! الرجاء اختيار المقاس',
        ]);


        $variant = Variant::where('product_id', $product->id)
            ->whereRaw('id in (select variants_id from variant__options where value = ?)', [$request->post('color')]) //color
            ->whereRaw('id in (select variants_id from variant__options where value = ?)', [$size = $request->post('size')]) //size
            ->first();

        // return response()->json($variant);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'color' => 'required',
            'size' => 'required',
            'quantity' => ['int', 'min:1', new QuantityValidate($variant)],

        ], [
            'quantity.integer' => 'حدث خطأ! الرجاء ادخال كمية صحيحة',
            'quantity.min' => 'حدث خطأ! يجب أن تكون الكمية أكبر من صفر',

        ]);



        $product_id = $request->post('product_id');
        $color = $request->post('color');
        $size = $request->post('size');
        $quantity = $request->post('quantity', 1);
        $variant_id  = $variant->id;



        $cart = Cart::where([
            'color' => $color,
            'size' => $size,
            'cart_id' => $cart_id,
            'product_id' =>  $product_id,
            'variant_id' => $variant_id,
        ])->first();

        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            $cart = Cart::create([
                'cart_id' => $cart_id,
                'product_id' => $request->post('product_id'),
                'quantity' => $request->post('quantity', 1),
                'color' => $color,
                'size' => $size,
                'variant_id' => $variant_id,
            ]);
        }
        $carts = Cart::where([
            'cart_id' => cart_id(),
        ])->get();

        $totalPrice = $carts->sum(function ($item) {
            return $item->product->final_price * $item->quantity;
        });

        $data = [
            'cart' => $cart,
            'count' => $carts->count(),
            'product' => $product,
            'totalPrice' => $totalPrice

        ];
        return response()->json($data, 200);
    }

    public function update_quantity(Request $request)
    {
        $request->validate([

            'quantity' => ['int', 'min:1'],

        ], [
            'quantity.integer' => 'حدث خطأ! الرجاء ادخال كمية صحيحة',
            'quantity.min' => 'حدث خطأ! يجب أن تكون الكمية أكبر من صفر',

        ]);

        $cart =  Cart::with('product')->where('product_id', $request->id)->where('cart_id', cart_id())->first();
        $cart->quantity = $request->quantity;
        $cart->save();

        $carts = Cart::where([
            'cart_id' => cart_id(),
        ])->get();
        $totalPrice = $carts->sum(function ($item) {
            return $item->product->final_price * $item->quantity;
        });
        $grand_total = $totalPrice;
        if ($request->city_id != null) {

            $city = City::where('id',$request->city_id)->first();

            $shipping_price = $city->price;

            $grand_total= $shipping_price + $totalPrice;


        }

        return response()->json([
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'grand_total' => $grand_total
    ]);
    }

    public function delete($id)
    {
        $cart =  Cart::where('product_id', $id)->where('cart_id', cart_id())->first();
        $cart->delete();
        return redirect()->back()->with('success', 'تم ازالة المنتج بنجاح');
    }

    public function shipping_price(Request $request)
    {
        $city = City::where('id',$request->id)->first();
        if ($city) {

            $shipping_price = $city->price;
            $carts = Cart::where([
                'cart_id' => cart_id(),
            ])->get();

            $totalPrice = $carts->sum(function ($item) {
                return $item->product->final_price * $item->quantity;
            });

            return response()->json([
                'shipping_price' => $shipping_price,
                'grand_total'=>$shipping_price + $totalPrice,
                'message' => " success ",

            ],200);

        } else {
            $carts = Cart::where([
                'cart_id' => cart_id(),
            ])->get();

            $totalPrice = $carts->sum(function ($item) {
                return $item->product->final_price * $item->quantity;
            });

            return response()->json([
                'grand_total'=>$totalPrice,
                'message' => "error",
            ],404);
        }

    }
}
