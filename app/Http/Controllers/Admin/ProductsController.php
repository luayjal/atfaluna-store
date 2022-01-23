<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate();
        $categories = Category::all();
        return view('dashboard.products.index',[
            'products' => $products,
            'categories'=> $categories
        ]);
    }

    public function trashProduct()
    {
        $products = Product::onlyTrashed()->latest()->paginate();
       
        return view('dashboard.products.trash',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
       
        return view('dashboard.products.create',[
            'categories' => $categories,
            'product' => new Product(),
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
            'name'=>'required|max:100|unique:categories,name',
            'image' =>'required|image',
          ],[
          'name.required'=>'مطلوب!، الرجاء إدخال اسم الفئة',
          'name.unique'=>' هذا الاسم موجود بالفعل ، رجاءا أدخل اسم آخر',
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
            //store certificate image
          if($request->hasFile('certificate')) {
            $certificate = $request->file('certificate');
            $data['certificate']= $certificate->store('/images',['disk' => 'uploads']);
            }

        $colors = json_decode($request->colors) ;
       $product = Product::create($data);

       if($request->hasFile('gallery')){
            foreach ($request->gallery as $image) {
                $image_file = $image->store('images',['disk' => 'uploads']);
                $product->images()->create([
                    'image_path' => $image_file
                ]);
            }
       }
       
       //store color 
       $product->colors()->attach($this->getColorOrSize($request->colors,Color::class));
       //store size
       $product->sizes()->attach($this->getColorOrSize($request->sizes,Size::class));

          return redirect()->route('admin.products.index')->with('success','تم اضافة المنتج بنجاح');
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
        $product = Product::findOrFail($id);
        $categories = Category::all();
       
        return view('dashboard.products.edit',[
            'product' => $product,
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
        $product = Product::findOrFail($id);
        $request->merge([
            'slug' => Str::slug_ar($request->name),
          ]);

        $data = $request->all();

        $prevImg = false;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('/images',['disk' => 'uploads']);
            $prevImg = $product->image;
        }
        
       
        $product->update($data);
        // update gallery
        if($request->hasFile('gallery')){
            foreach ($request->gallery as $image) {
                $image_file = $image->store('images',['disk' => 'uploads']);
                $product->images()->create([
                    'image_path' => $image_file
                ]);
            }
       }
       
        //store color 
        if($request->has('colors')){

            $product->colors()->sync($this->getColorOrSize($request->colors,Color::class));
        }
       //store size
       if ($request->has('sizes')) {
          
           $product->sizes()->sync($this->getColorOrSize($request->sizes,Size::class));
       }

        if($prevImg){

            Storage::disk('uploads')->delete($prevImg);
        }
        return redirect()->route('admin.products.index')->with('success','تم تحديث المنتج بنجاح');
    }

    public function restore($id){

        $product = Product::withTrashed()->findOrFail($id);
      
            $product->restore();
        
            return redirect()->route('admin.products.index')->with('success','تم استرجاع المنتج بنجاح');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = Product::withTrashed()->findOrFail($id);
      
       if ($product->trashed()) {
        $product->restore();
        $product->forceDelete();

        $prevImg = $product->image;
       if($prevImg){

        Storage::disk('uploads')->delete($prevImg);
        }
    }
    else{
        $product->delete();
    }
       
       return redirect()->route('admin.products.index')->with('success','تم حذف المنتج بنجاح');
    
    }

    public function getColorOrSize($request,$model){
        //dd($request);
        $items = json_decode($request);

        $items_id = [];
        if (is_array($items) && count($items) > 0) {
            foreach ($items as $item) {
             
                $model_id = $model::UpdateOrCreate([
                    'name' => $item->value 
                ],
                 [
                     'name' => $item->value,
                 ]);
               $items_id[]=$model_id->id;  
             }
    
             return $items_id;
        }
        
    }
}
