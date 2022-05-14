<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);

        $categores = Category::latest()->paginate();

        return view('dashboard.category.index',[
            'categories' => $categores,
        ]);
    }

    public function trashCategory()
    {
        $categores = Category::onlyTrashed()->latest()->paginate();

        return view('dashboard.category.trash',[
            'categories' => $categores,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);

        $categories = Category::all();
       //dd($categories);
        return view('dashboard.category.create',[
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
        $this->authorize('create', Category::class);

        $request->validate([
            'name'=>'required|min:3|max:100|unique:categories,name',
            'image' =>'image',
          ],[
          'name.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
          'name.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
          'name.min'=>' يجب ألا يقل الاسم عن ثلاثة احرف',
          'name.max'=>' يجب ألا يزيد الاسم عن مائة حرف',
          ]);

          $request->merge([
            'slug' => Str::slug_ar($request->name),
          ]);

          $data = $request->all();

          if($request->hasFile('image')) {
            $file = $request->file('image');
           // $file->move(public_path('uploads/images'), uniqid() . '.' .  $file->getClientOriginalExtension());
            $data['image']= $file->store('/images',['disk' => 'uploads']);
        }

          Category::create($data);
          return redirect()->route('admin.categories.index')->with('success','تم اضافة القسم بنجاح');
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
        $category = Category::findOrFail($id);
        $this->authorize('update', $category);

        $categories = Category::all();

        return view('dashboard.category.edit',[
            'category' => $category,
            'categories'=>$categories,
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
        $category = Category::findOrFail($id);
        $this->authorize('update', $category);

        $request->merge([
            'slug' => Str::slug_ar($request->name),
          ]);

        $data = $request->all();

        $prevImg = false;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('/images',['disk' => 'uploads']);
            $prevImg = $category->image;
        }


        $category->update($data);
        if($prevImg){

            Storage::disk('uploads')->delete($prevImg);
        }
        return redirect()->route('admin.categories.index')->with('success','تم تحديث القسم بنجاح');
    }

    public function restore($id){

        $category = Category::withTrashed()->findOrFail($id);
        $this->authorize('delete', $category);

            $category->restore();

            return redirect()->route('admin.categories.index')->with('success','تم استرجاع القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category = Category::withTrashed()->findOrFail($id);
       $this->authorize('delete', $category);

       if ($category->trashed()) {
        $category->restore();
        $category->forceDelete();
    }
    else{
        $category->delete();
    }
       $prevImg = $category->image;
       if($prevImg){

        Storage::disk('uploads')->delete($prevImg);
    }
       return redirect()->route('admin.categories.index')->with('success','تم حذف القسم بنجاح');

    }
}
