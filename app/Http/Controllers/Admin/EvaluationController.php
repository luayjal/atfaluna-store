<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryAgents;
use App\Models\DeliveryEvaluation;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductsEvaluation;
use App\Models\StoreReviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EvaluationController extends Controller
{
    public function store_reviews()
    {

        $reviews = StoreReviews::latest()->paginate();
        return view('dashboard.evaluation.store', [
            'reviews' => $reviews,
        ]);
    }
    public function delete_store_review($id)
    {

        $review = StoreReviews::findOrFail($id);
        $review->delete();
        return redirect()->back()->with('success', 'تم حذف التقييم بنجاح');
    }

    public function index_delivery()
    {
        //        $this->authorize('index_delivery', DeliveryAgents::class);

        $eval = DB::table('delivery_evaluations')
            ->join('delivery_agents', 'delivery_agents.id', '=', 'delivery_evaluations.delivery_id')
            ->join('users', 'users.id', '=', 'delivery_agents.user_id')
            ->select('delivery_evaluations.id', 'delivery_id', 'eval', 'review', 'status', 'name')
            ->paginate();
        return view('dashboard.evaluation.index_delivery', [
            'evals' => $eval,
        ]);
    }

    public function change_delivery($id)
    {
        //        $this->authorize('change_delivery', DeliveryAgents::class);
        $eval = DeliveryEvaluation::findOrFail($id);
        $eval->update(array(
            "status" => 'active'
        ));
        return redirect()
            ->route('admin.evaluation.delivery.index')
            ->with('success', 'تم تفعيل التقييم بنجاح');
    }

    public function delete_delivery($id)
    {
        //        $this->authorize('delete_delivery', DeliveryAgents::class);


        $eval = DeliveryEvaluation::findOrFail($id);
        $eval->delete();
        return redirect()
            ->route('admin.evaluation.delivery.index')
            ->with('success', 'تم حذف التقييم بنجاح');
    }

    public function index_products()
    {
        //        $this->authorize('index_products', DeliveryAgents::class);

        $eval = DB::table('products_evaluations')
            ->join('products', 'products.id', '=', 'products_evaluations.product_id')
            ->select('products_evaluations.id', 'product_id', 'eval', 'review', 'products_evaluations.status', 'name')
            ->paginate();
        return view('dashboard.evaluation.index_products', [
            'evals' => $eval,
        ]);
    }

    public function change_products($id)
    {
        //        $this->authorize('change_products', DeliveryAgents::class);
        $eval = ProductsEvaluation::findOrFail($id);
        $eval->update(array(
            "status" => 'active'
        ));
        return redirect()
            ->route('admin.evaluation.products.index')
            ->with('success', 'تم تفعيل التقييم بنجاح');
    }

    public function delete_products($id)
    {
        //        $this->authorize('delete_products', DeliveryAgents::class);

        $eval = ProductsEvaluation::findOrFail($id);
        $eval->delete();
        return redirect()
            ->route('admin.evaluation.products.index')
            ->with('success', 'تم حذف التقييم بنجاح');
    }


    public function eval_delivery2($key, Request $request)
    {
        $id = $this->safeDecrypt($key);
        $order = Order::findOrFail($id);
        $checkEval = DeliveryEvaluation::where('order_id', '=', $id)->count();
        if ($checkEval == 0) {
            $data = $request->all();
            $data['order_id'] = $id;
            $data['delivery_id'] = $order->delivery_id;
            DeliveryEvaluation::create($data);
            return redirect()->route('home')->with('success', 'تم اضافة التقييم بنجاح');
        } else {
            abort(403);
        }
    }

    public function eval_delivery($key)
    {
        $id = $this->safeDecrypt($key);
        $order = Order::findOrFail($id);
        $checkEval = DeliveryEvaluation::where('order_id', '=', $id)->count();


        $eval = DeliveryEvaluation::where('order_id', '=', $id)->first();
        $delivery = DeliveryAgents::findOrFail($order->delivery_id);
        return view('front.eval_d', [
            'checkEval' => $checkEval,
            'delivery' => $delivery,
            'eval' => $eval,
            'id' => $key

        ]);
    }


    public function eval_product2($key, Request $request)
    {
        $id = $this->safeDecrypt($key);
        $order = Order::findOrFail($id);
        $checkEval = ProductsEvaluation::where('order_id', '=', $id)->count();
        $eval = ProductsEvaluation::where('order_id', '=', $id)->get();
        $OrderItems = OrderItem::where('order_id', '=', $id)->get();
        if ($checkEval == 0) {
            $data = $request->all();
            $product_id = $data['product_id'];
            $eval = $data['eval'];
            $review = $data['review'];
            for ($no = 0; $no < count($product_id); ++$no) {


                $dt['product_id'] = $data['product_id'][$no];
                $dt['eval'] = $data['eval'][$no];
                $dt['review'] = $data['review'][$no];
                $dt['order_id'] = $id;
                //                dd($dt);
                ProductsEvaluation::create($dt);
            }

            return redirect()->route('home')->with('success', 'تم اضافة التقييم بنجاح');
        } else {
            abort(403);
        }
    }

    public function eval_product($key)
    {
        $id = $this->safeDecrypt($key);
        //return $id;
       // $order = Order::findOrFail($id);
        $checkEval = ProductsEvaluation::where('order_id', '=', $id)->count();
        $eval = ProductsEvaluation::where('order_id', '=', $id)->get();
        $OrderItems = OrderItem::where('order_id', '=', $id)->get();
        $Products = array();
        if ($checkEval == 0) {
            foreach ($OrderItems as $OrderItem) {
                $pr = DB::table('products')
                    ->select('id', 'name', 'image')
                    ->where('id', '=', $OrderItem->product_id)
                    ->first();
                $Products[] = $pr;
            }
        } else {
            foreach ($OrderItems as $OrderItem) {
                $pr = DB::table('products')
                    ->select('products.id', 'name', 'image', 'review', 'eval')
                    ->join('products_evaluations', 'products_evaluations.product_id', '=', 'products.id')
                    ->where('products.id', '=', $OrderItem->product_id)
                    ->first();
                $Products[] = $pr;
            }
        }
        return view('front.eval_p', [
            'checkEval' => $checkEval,
            'Products' => $Products,
            'eval' => $eval,
            'id' => $key

        ]);
    }



    function safeEncrypt($key)
    {
        return openssl_encrypt($key, "AES-128-ECB", "jkjdfghkdkfjg");
    }

    function safeDecrypt($encrypted)
    {
        $Decrypt = openssl_decrypt($encrypted, "AES-128-ECB", "jkjdfghkdkfjg");
        if (!$Decrypt) abort(500);
        return $Decrypt;
    }
}
