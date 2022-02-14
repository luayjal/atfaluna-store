<?php

namespace App\Http\Controllers\Admin;

use App\Models\city;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = city::latest()->paginate();

        return view('dashboard.city.index',[
            'cities' => $cities,
        ]);
    }

    public function trashCity()
    {
        $cities = city::onlyTrashed()->latest()->paginate();

        return view('dashboard.city.trash',[
            'cities' => $cities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = city::all();
        return view('dashboard.city.create',[
            'categories' => $categories,
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
            'name'=>'required|min:3|max:100|unique:categories,name',
            'image' =>'image',
          ],[
          'name.required'=>'مطلوب!، الرجاء إدخال الاسم',
          'name.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
          'name.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
          'name.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
          ]);

          $request->merge([
            'slug' => Str::slug_ar($request->name),
          ]);

          $data = $request->all();
          city::create($data);
          return redirect()->route('admin.city.index')->with('success','تم اضافة المدينة بنجاح');
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
        $city = city::findOrFail($id);

        return view('dashboard.city.edit',[
            'city' => $city,
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
        $city = city::findOrFail($id);
        $request->merge([
            'slug' => Str::slug_ar($request->name),
          ]);

        $data = $request->all();
        $city->update($data);
        return redirect()->route('admin.city.index')->with('success','تم تحديث بيانات المدينة بنجاح');
    }

    public function restore($id){

        $city = city::withTrashed()->findOrFail($id);

            $city->restore();

            return redirect()->route('admin.city.index')->with('success','تم استرجاع بيانات المدينة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $city = city::withTrashed()->findOrFail($id);

       if ($city->trashed()) {
        $city->restore();
        $city->forceDelete();
    }
    else{
        $city->delete();
    }

       return redirect()->route('admin.city.index')->with('success','تم حذف المدينة بنجاح');

    }
}
