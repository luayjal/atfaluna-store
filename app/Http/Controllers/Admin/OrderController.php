<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class OrderController extends Controller
{
   public function index(){
    $orders = Order::where('status','<>','canceled')->latest()->paginate();
    return view('dashboard.order.index',[
        'orders' => $orders,
    ]);

   }
   public function OrderCancel(){
    $orders = Order::where('status','canceled')->latest()->paginate();
    return view('dashboard.order.cancel',[
        'orders' => $orders,
    ]);
   }

   public function orderDetails($id){
    $order = Order::with('items')->findOrFail($id);
    //return $order;
    //return OrderItem::where('order_id',$id)->with('variant')->with('product')->get();
   $products=  $order->Items->where('gift_id',null)->all() ;
  //  dd($products->variant);
    $gifts = $order->Items->where('product_id',null)->all() ;
    return view('dashboard.order.details',[
        'order' => $order,
        'products' =>$products,
        'gifts' => $gifts
    ]);
   }
   public function orderEval($id){
    $order = Order::findOrFail($id);
   $key=  openssl_encrypt($id, "AES-128-ECB", "jkjdfghkdkfjg");
   $url =route('eval.product', $key);

    return redirect()->back()->with('url',$url);
   }

   public function cancelOrder($id){

    $order = Order::findOrFail($id);
    $order->status = "canceled";
    $order->save();
    return redirect()->back()->with('success',"تم الغاء الطلب بنجاح");
   }
}
