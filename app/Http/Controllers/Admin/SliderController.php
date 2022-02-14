<?php

namespace App\Http\Controllers\Admin;

use App\Models\city;
use App\Models\Coupon;
use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::latest()->paginate();

        return view('dashboard.slider.index',[
            'sliders' => $sliders,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.slider.create');
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
            'image' =>'image',
            'link' =>'required',
          ],[
          'image.required'=>'مطلوب!، الرجاء إدراج الصورة',
          'link.required'=>'مطلوب!، الرجاء إدراج الرابط'
        ]);
        $data = $request->all();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image_path']= $file->store('/images',['disk' => 'uploads']);
        }


          Slider::create($data);
          return redirect()->route('admin.slider.index')->with('success','تم اضافة السلايدر بنجاح');
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
        $slider = Slider::findOrFail($id);

        return view('dashboard.slider.edit',[
            'slider' => $slider,
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
        $request->validate([
            'link' =>'required',
        ],[
            'link.required'=>'مطلوب!، الرجاء إدراج الرابط'
        ]);
        $slider = Slider::findOrFail($id);
        $data = $request->all();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image_path']= $file->store('/images',['disk' => 'uploads']);
        }
        $slider->update($data);
        return redirect()->route('admin.slider.index')->with('success','تم تحديث بيانات المدينة بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

       return redirect()->route('admin.slider.index')->with('success','تم حذف السلايدر بنجاح');

    }
}
