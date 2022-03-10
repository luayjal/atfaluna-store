<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\StoreReviews;
use Illuminate\Http\Request;

class StoreRiviewsController extends Controller
{
    public function index() {

        $reviews = StoreReviews::latest()->paginate();
        return view('front.store-reviews',[
            'reviews'=>$reviews,
        ]);
    }

    public function store(Request $request){
            $request->validate([
                'name'=>'required',
                'rating'=>'required',
                'review'=>'required',
            ],
            ['required' => 'هذا الحقل مطلوب']);

            StoreReviews::create($request->all());
            return redirect()->back();
    }
}
