<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\StoreReviews;
use App\Models\DeliveryAgents;
use App\Models\DeliveryEvaluation;
use App\Models\ProductsEvaluation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EvaluationController extends Controller
{

   public function store_reviews(){

    $reviews = StoreReviews::latest()->paginate();
    return view('dashboard.evaluation.store',[
        'reviews'=>$reviews,
    ]);
   }
   public function delete_store_review($id){

    $review = StoreReviews::findOrFail($id);
    $review->delete();
    return redirect()->back()->with('success','تم حذف التقييم بنجاح');
   }

    public function index_delivery()
    {
//        $this->authorize('index_delivery', DeliveryAgents::class);

        $eval =  DB::table('delivery_evaluations')
            ->join('delivery_agents', 'delivery_agents.id', '=', 'delivery_evaluations.delivery_id')
            ->join('users', 'users.id', '=', 'delivery_agents.user_id')
            ->select('delivery_evaluations.id','delivery_id','eval','review','status','name')
            ->paginate();
        return view('dashboard.evaluation.index_delivery', [
            'evals' => $eval,
        ]);
    }

    public function change_delivery($id)
    {
//        $this->authorize('change_delivery', DeliveryAgents::class);
        $eval=DeliveryEvaluation::findOrFail($id);
        $eval->update(array(
            "status" =>'active'
        ));
        return redirect()
            ->route('admin.evaluation.delivery.index')
            ->with('success','تم تفعيل التقييم بنجاح');

    }

    public function delete_delivery($id)
    {
//        $this->authorize('delete_delivery', DeliveryAgents::class);


        $eval=DeliveryEvaluation::findOrFail($id);
        $eval->delete();
        return redirect()
            ->route('admin.evaluation.delivery.index')
            ->with('success','تم حذف التقييم بنجاح');

    }

    public function index_products()
    {
//        $this->authorize('index_products', DeliveryAgents::class);

        $eval =  DB::table('products_evaluations')
            ->join('products', 'products.id', '=', 'products_evaluations.product_id')
            ->select('products_evaluations.id','product_id','eval','review','products_evaluations.status','name')
            ->paginate();
        return view('dashboard.evaluation.index_products', [
            'evals' => $eval,
        ]);
    }

    public function change_products($id)
    {
//        $this->authorize('change_products', DeliveryAgents::class);

        $eval=ProductsEvaluation::findOrFail($id);
        $eval->update(array(
            "status" =>'active'
        ));
        return redirect()
            ->route('admin.evaluation.products.index')
            ->with('success','تم تفعيل التقييم بنجاح');

    }

    public function delete_products($id)
    {
//        $this->authorize('delete_products', DeliveryAgents::class);

        $eval=ProductsEvaluation::findOrFail($id);
        $eval->delete();
        return redirect()
            ->route('admin.evaluation.products.index')
            ->with('success','تم حذف التقييم بنجاح');

    }
}
