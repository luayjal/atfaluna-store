<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Gift;
use App\Models\Product;
use Illuminate\Http\Request;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gift::paginate();

        return view('dashboard.gifts.index',[
            'gifts' =>  $gifts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $products = Product::where('status','in-stock')->get();
        return view('dashboard.gifts.create',[
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'code' => 'required|unique:coupons,code',
            'status' => 'required',
        ],[
            'required' => 'حقل :attribute مطلوب ملؤه.',
            'code.unique' => 'هذا الكود مستخدم من قبل الرجاء اختيار كود آخر'
        ]);

        $request->merge([
            'type_table'=> 'gift'
        ]);
        $data = $request->all();
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');
            $data['cover_image'] = $file->store('/images',['disk' => 'uploads']);
        }

        Gift::create($data);
        return redirect()->route('admin.gifts.index')->with('status','تمت اضافة الهدية بنجاح');
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
        $gift = Gift::findOrFail($id);

        $products = Product::where('status','in-stock')->get();
        return view('dashboard.gifts.edit',[
            'products' => $products,
            'gift' => $gift
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
        $gift = Gift::findOrFail($id);
        $gift->update($request->all());
        return redirect()->route('admin.gifts.index')->with('status','تمت تعديل الهدية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = Gift::findOrFail($id);
        $gift->delete();
        $gift->deleting($id);
        return redirect()->route('admin.gifts.index')->with('status','تمت حذف الهدية بنجاح');
    }
}
