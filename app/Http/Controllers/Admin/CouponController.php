<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Coupon::class); 

        $coupons = Coupon::latest()->paginate();
        return view('dashboard.coupon.index',['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Coupon::class); 

        return view('dashboard.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Coupon::class); 

        $request->validate([
            'code'=>'required|unique:coupons,code',
            'type'=>'required',
            'status'=>'required',
            'discount_value'=>'required',
            'start_date'=>'required',
            'expire_date'=>'required',
            'greater_than' => 'required',
           
            
        ],[
            'code.required'=>'يحب ادخال الكود',
            'type.required'=>'يحب ادخال النوع',
            'status.required'=>'يحب ادخال الحالة',
            'discount_value.required'=>'يحب ادخال القيمة',
            'start_date.required'=>'يحب ادخال تاريخ الابتداء',
            'expire_date.required'=>'يحب ادخال تاريخ الإنتهاء',
            'greater_than.required' => 'يحب ادخال مجموع المشتريات',
            'code.unique'=> 'هذا الكود موجود ، الرجاء إدخال كود آخر'
        ]);
     
        Coupon::create($request->all());
        return redirect()->route('admin.coupons.index')->with('status','تمت الإضافة!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        $this->authorize('update', $coupon); 

       
        return view('dashboard.coupon.edit',[
            'coupon' => $coupon,
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);
        $this->authorize('update', $coupon); 

        $request->validate([
            'code'=>'required',
            'type'=>'required',
            'status'=>'required',
            'discount_value'=>'required',
            'start_date'=>'required',
            'expire_date'=>'required',
        ],[
            'code.required'=>'يحب ادخال الكود',
            'type.required'=>'يحب ادخال النوع',
            'status.required'=>'يحب ادخال الحالة',
            'discount_value.required'=>'يحب ادخال القيمة',
            'start_date.required'=>'يحب ادخال تاريخ الابتداء',
            'expire_date.required'=>'يحب ادخال تاريخ الإنتهاء',
       ]);
      // return $request->all();
       $coupon->update($request->all());

       return redirect()->route('admin.coupons.index')->with('status','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $this->authorize('delete', $coupon); 

        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('status','تم الحذف بنجاح');
    }
}