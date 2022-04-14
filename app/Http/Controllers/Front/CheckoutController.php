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
use App\Services\Moyasar\Moyasar;
use Illuminate\Support\Facades\Session;
use App\Services\Whatsapp\sendMessage;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate(
            [   'name'=>'required|string',
                'phone'=>'required',
                'email'=>'email|required',
                'city'=>'required',
                'street'=>'required',
                'postcode'=>'required',
        ]
        );

        if ($request->payment_method == 'cancel') {

            return redirect('/')->with('success', 'تم  الغاء طلبك بنجاح');
        }

        $referance_id = 'ord-' . time();
        $carts = Cart::with('product')->where('cart_id', cart_id())->update([
            'referance_id' => $referance_id
        ]);

        $carts = Cart::with('product')->where([
            ['referance_id' ,'=', $referance_id],
            [ 'gift_id','=', null]
            ])->get();



        $total_product = $carts->sum(function ($item) {
            return $item->product->final_price * $item->quantity;
        });

        $city = City::findOrFail($request->city);


        // apply coupon

        if ($request->code) {

        }

        //---------------------------------------------------
        //  ***************  Create Customer *********
        //--------------------------------------------------
        $request->merge([
            'address' => $city->name . "-" . $request->street,
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
       // dd($carts);

        foreach ($carts as $item) {
            $order->Items()->create([
                'product_id' => $item->product_id,
                'variant_id' => $item->variant_id,
                'quantity' => $item->quantity,
                'price' => $item->product->final_price,
                'total' => $item->quantity * $item->product->final_price,
            ]);
        }

     /*****  save gift in order items ******/
     $gift_carts = Cart::with('product')->where([
        ['referance_id' ,'=', $referance_id],
        [ 'gift_id','<>', null]
        ])->get();

     foreach ($gift_carts as $item) {
        $order->Items()->create([
            'gift_id' => $item->gift_id,
            'quantity' => 1,
            'price' => 0,
            'total' =>0,
        ]);
    }


        /************************************* */
        /*    $message = new sendMessage();
        $message->send($customer->phone);
        $msg =  $message->nexmoSend($customer->phone);
        return $msg;
        return response()->json($msg) ;
        $request->user()->notify(new OrderProcessed($order)); */




        //  ***************  Payment Form *********
        return redirect()->route('checkout.payment', $order->id);






    }

    public function formPayment($id)
    {
        $order = Order::findOrFail($id);
        return view('front.payment', [
            'order' => $order
        ]);
    }

    public function callback(Request $request, $referance_id)
    {
        // dd($request->all());
        $id_payment = $request->query('id');
        $payment = new Moyasar();
        $response = $payment->fetch($id_payment);
        //dd($response);
        /* $res = $payment->capture($id_payment);
        dd($res); */
        // to do
        if ($response['status'] == "paid") {
            //update order
            $order = Order::where('transaction_id', $referance_id)->first();
            $order->payment_status = 'paid';
            $order->status = "preparing";
            $order->update();
            //send mail
            $details['title'] = 'لديك طلب جديد';
            $details['body'] = 'قام شخص بطلب عباءة جديدة';

            //Mail::to('luay99@outlook.sa')->send(new NewOrderCreated($details, $order));

            $carts = Cart::where('referance_id', $referance_id)->get();

            foreach ($carts->where('gift_id', null) as $cart) {
                if ( $cart->product->quantity <= $cart->quantity  ) {
                    $cart->product()->update([
                        'quantity' => 0,
                    ]);
                }else{

                    $cart->product->decrement('quantity', $cart->quantity);
                }
                $cart->delete();
            }
            Cart::where('referance_id', $referance_id)->where('gift_id','<>',null)->delete();

            return redirect()->route('cart')->with('success', 'تم الدفع بنجاح');
        } else if ($response['status'] == "failed") {

            return redirect()->route('cart')->with('error', 'حدث خطأ! لم يتم اتمام عملية الدفع');

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
