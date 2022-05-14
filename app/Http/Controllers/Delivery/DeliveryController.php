<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index()
    {
        $data = DB::table('orders')
            ->select('*')
            ->join("customers", "orders.customer_id", "=", "customers.id")
            ->where('status', '=', 'pending')
            ->orderBy("orders.id", "DESC")
            ->get();
        return $data;
        return view('Delivery.Incoming', [
            'data' => $data,
        ]);
    }
    public function recived()
    {
        $data = DB::table('orders')
            ->select('orders.id', 'name', 'email', 'phone', 'address', 'postcode', 'grandtotal')
            ->join("customers", "orders.customer_id", "=", "customers.id")
            ->where('delivery_id', '=', Auth::user()->id)
            ->where('status', '=', 'in_route')
            ->orderBy("orders.id", "DESC")
            ->get();

        return view('Delivery.recived', [
            'data' => $data,
        ]);
    }
    public function get($id)
    {

        $data = DB::table('orders')
            ->select('orders.id', 'name', 'email', 'phone', 'address', 'postcode', 'grandtotal')
            ->join("customers", "orders.customer_id", "=", "customers.id")
           ->where('status', '=', 'pending')
           ->where('delivery_id', '=', null)
            ->where('orders.id', '=', $id)
            ->orderBy("orders.id", "DESC")
            ->first();
        dd($data);
        if ($data == null)
            abort(404, "no data found");
        else {

            $order = Order::findOrFail($id);


            $data = array(
                'status' => 'in_route',
                'delivery_id' => Auth::user()->id,

            );
            $order->update($data);
            return redirect()->route('Delivery.recived')->with('success', 'تم استلام الطلب ');
        }
    }
    public function details($id)
    {
        $data = DB::table('orders')
            ->select('orders.id', 'name', 'email', 'phone', 'address', 'postcode', 'grandtotal')
            ->join("customers", "orders.customer_id", "=", "customers.id")
            ->where('delivery_id', '=', Auth::user()->id)
            ->where('orders.id', '=', $id)
            ->orderBy("orders.id", "DESC")
            ->first();
        if ($data == null)
            abort(404, "no data found");
        else
            return view('Delivery.Details', [
                'data' => $data,
            ]);
    }
    public function complete()
    {
        $data = DB::table('orders')
            ->select('orders.id', 'name', 'email', 'phone', 'address', 'postcode', 'grandtotal')
            ->join("customers", "orders.customer_id", "=", "customers.id")
            ->where('delivery_id', '=', Auth::user()->id)
            ->where('status', '=', 'completed')
            ->orderBy("orders.id", "DESC")
            ->get();

        return view('Delivery.complete', [
            'data' => $data,
        ]);
    }
    public function com($id)
    {

        $data = DB::table('orders')
            ->select('orders.id', 'name', 'email', 'phone', 'address', 'postcode', 'grandtotal')
            ->join("customers", "orders.customer_id", "=", "customers.id")
            ->where('status', '=', 'in_route')
            ->where('delivery_id', '=', Auth::user()->id)
            ->where('orders.id', '=', $id)
            ->orderBy("orders.id", "DESC")
            ->first();
        if ($data == null)
            abort(404, "no data found");
        else {

            $order = Order::findOrFail($id);


            $data = array(
                'status' => 'completed'
            );
            $order->update($data);
            return redirect()->route('Delivery.complete')->with('success', 'تم تسليم الطلب ');
        }
    }
}
