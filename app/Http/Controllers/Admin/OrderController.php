<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   public function index(){
    $orders = Order::paginate();
    return view('dashboard.order.index',[
        'orders' => $orders,
    ]);
   }

   public function orderDetails($id){
    $order = Order::findOrFail($id);
    
    //return $order->Items;
    return view('dashboard.order.details',[
        'order' => $order,
    ]);
   }
}
