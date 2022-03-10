<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;

use App\Models\City;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Costumer;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\Coupons\Coupons;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrderProcessed;
use Illuminate\Support\Facades\Session;
use App\Services\Whatsapp\sendMessage;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {


      if ($request->payment_method == 'cancel') {

        return redirect('/')->with('success', 'تم  الغاء طلبك بنجاح');
      }

      $referance_id = 'ord-' . time();
      $carts = Cart::with('product')->where('cart_id', App::make('cart.id'))->update([
        'referance_id' => $referance_id
      ]);
      $carts = Cart::with('product')->where('referance_id', $referance_id)->get();


      $total_product = $carts->sum(function($item)
      {
          return $item->product->price * $item->quantity;
      });

      $city = City::findOrFail($request->city);


      // apply coupon

      if ($request->code  ){


      }

      //---------------------------------------------------
      //  ***************  Create Customer *********
      //--------------------------------------------------
      $request->merge([
          'address'=>$city->name."-". $request->street,
      ]);

      if (Auth::check()) {

        if (Auth::user()->customer) {
          $customer = Auth::user()->customer;
          $customer->update($request->all());
        } else {

          $customer = Customer::create($request->all());
        }
      } else {

        $customer = Customer::create($request->all());
      }

      //---------------------------------------------------
      //  ***************  Create Order *********
      //---------------------------------------------------
      $order = new Order;
      $order->customer_id = $customer->id;
    //  $order->payment_method = $request->payment_method;
      $order->payment_status = 'unpaid';
      $order->transaction_id =  $referance_id;
      $order->subtotal = $total_product;
      $order->shipping_price = $city->price;
      $order->grandtotal = $total_product + $city->price;
      $order->coupon_id = $total_discount['id']  ?? null;
      $order->save();


        foreach ($carts as $item) {
          $order->Items()->create([
            'product_id' => $item->product_id,
            'variant_id' => $item->variant_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
            'total' => $item->quantity * $item->product->price,
          ]);
        }


  /************************************* */
     /*    $message = new sendMessage();
        $message->send($customer->phone);
        $msg =  $message->nexmoSend($customer->phone);
        return $msg;
        return response()->json($msg) ;
        $request->user()->notify(new OrderProcessed($order)); */

     return redirect('/');



      //---------------------------------------------------
      //  ***************  Payment Getway *********
      //---------------------------------------------------


      }



    public function success(Request $request, $referance_id)
    {
      //dd($request->all());
      // remove session coupon
      if (session('new total')) {
        Session::remove('new total');
      }
      $session_id = session()->get('order_session_id_' . $referance_id);
    //  $payment = new ThawaniSession();
     // $payment->getSession($session_id);
      // to do

      //update order
      $order = Order::where('transaction_id', $referance_id)->first();
      $order->payment_status = 'paid';
      $order->cod_amount = 0;
      $order->status = "preparing";
      $order->update();
      //send mail
      $details['title'] = 'لديك طلب جديد';
      $details['body'] = 'قام شخص بطلب عباءة جديدة';

      //Mail::to('luay99@outlook.sa')->send(new NewOrderCreated($details, $order));
      if (session()->has('buy_now')) {
        $carts = collect( session()->get('buy_now'));
        $carts->get('quantity');
        $product = Product::where('id', $carts->get('product_id'))->first();

        $product->decrement('quantity', $carts->get('quantity') );
        session()->forget('buy_now');
        return redirect('/')->with('success', 'تم الدفع بنجاح');


    }else{
      $carts = Cart::where('referance_id', $referance_id)->get();

      foreach ($carts as $cart) {
        $cart->product->decrement('quantity', $cart->quantity);
        $cart->delete();
      }

      return redirect('/')->with('success', 'تم الدفع بنجاح');
    }
    }


    public function cancel(Request $request, $referance_id)
    {
      //dd($request->all());

      $order = Order::where('transaction_id', $referance_id)->first();
      $order->status = "canceled";
      $order->update();


      return redirect('/')->with('success', 'تم الغاء الطلب بنجاح');
    }
}