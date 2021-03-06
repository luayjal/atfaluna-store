<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Variant_Option;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);


        $products = Product::when($request->name, function($query, $value) {
            $query->where(function($query) use ($value) {
                $query->where('products.name', 'LIKE', "%{$value}%");

            });
        })
        ->when($request->parent_id, function($query, $value) {
            $query->where('products.category_id', '=', $value);
        })
        ->latest()->paginate();
        $categories = Category::all();
        return view('dashboard.products.index',[
            'products' => $products,
            'categories'=> $categories
        ]);
    }

    public function trashProduct()
    {
        $this->authorize('delete', Product::class);

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
        $this->authorize('create', Product::class);

        $categories = Category::all();

        return view('dashboard.products.create',[
            'categories' => $categories,
            'product' => new Product(),
            'sizes'=>false,
            'colors'=>false,
            'code_variant' => false,
            'price_variant'=>false,
            'quantity_variant'=>false,
            'id_variant'=>false,
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
        $this->authorize('create', Product::class);

        $request->validate([
            'name'=>'required|max:100|unique:products,name',
            'image' =>'required|image',
            'code'=>'required',
            'price' => 'required',
            'quantity'=>'required',
            'status'=>'required',
            'colors'=>'required',
            'sizes'=>'required',
            'category_id'=>'required',

          ],[
          'name.required'=>'??????????!?? ???????????? ?????????? ?????? ????????????',
          'name.unique'=>' ?????? ?????????? ?????????? ???????????? ?? ???????? ?????????? ?????? ??????',
          'name.max'=>' ?????? ?????? ???????? ?????????? ???? ???????? ??????',
          'required'=> '?????? ?????? ! ???????????? ?????? ?????? ?????? ?????????? ????????'
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

            //img disc

          if($request->hasFile('img_description_size')) {
            $img_disc = $request->file('img_description_size');
            $data['img_description_size']= $img_disc->store('/images',['disk' => 'uploads']);
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

            $variant = $request->variant;

            foreach ($variant as $variantss) {
                 $variants = array(
                    'product_id' => $product->id,
                    'code_variant' => $variantss['code_variant'],
                    'price_variant' => $variantss['price_variant'],
                    'quantity_variant' => $variantss['quantity_variant'],

                );

                $variant_create = Variant::create($variants);
                $variant_options_size = array(
                    'variants_id' => $variant_create->id,
                    'option' => 'size',
                    'value' => $variantss['size'],
                );
                Variant_Option::create($variant_options_size);
                $variant_options_color = array(
                    'variants_id' => $variant_create->id,
                    'option' => 'color',
                    'value' => $variantss['color'],
                );
                Variant_Option::create($variant_options_color);
            }

          return redirect()->route('admin.products.index')->with('success','???? ?????????? ???????????? ??????????');
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
        $this->authorize('update',$product);

        $variants = Variant::where('product_id', $product->id)->get();

       $id_variant = $variants->pluck('id');
       $code_variant = $variants->pluck('code_variant');
       $price_variant = $variants->pluck('price_variant');
       $quantity_variant = $variants->pluck('quantity_variant');

        $sizes = Variant_Option::whereRaw('variants_id in (select id from variants where product_id = ?)', [$product->id])
            ->where('option', 'size')->distinct()->select('value')
            ->pluck('value');

        $colors = Variant_Option::whereRaw('variants_id in (select id from variants where product_id = ?)', [$product->id])
        ->where('option', 'color')->distinct()
        ->select('value')->pluck('value');

        $colors = json_decode($colors);
        $colors =implode(',',$colors) ;

        $sizes = json_decode($sizes);
        $sizes =implode(',',$sizes) ;
        //return $sizes;
        $categories = Category::all();

        return view('dashboard.products.edit',[
            'product' => $product,
            'categories'=>$categories,
            'sizes'=>$sizes,
            'colors'=>$colors,
            'code_variant' => $code_variant,
            'price_variant'=>$price_variant,
            'quantity_variant'=>$quantity_variant,
            'id_variant'=>$id_variant,
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
        $this->authorize('update',$product);

        $request->validate([
            'name'=>['required','max:100',Rule::unique('products')->ignore($product->id)],
            'image' =>'image',
            'code'=>'required',
            'price' => 'required',
            'quantity'=>'required',
            'status'=>'required',
            'colors'=>'required',
            'sizes'=>'required',
            'category_id'=>'required',

          ],[
          'name.required'=>'??????????!?? ???????????? ?????????? ?????? ????????????',
          'name.unique'=>' ?????? ?????????? ?????????? ???????????? ?? ???????? ?????????? ?????? ??????',
          'name.max'=>' ?????? ?????? ???????? ?????????? ???? ???????? ??????',
          'required'=> '?????? ?????? ! ???????????? ?????? ?????? ?????? ?????????? ????????'
          ]);

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

             //store certificate image
             if($request->hasFile('certificate')) {
                $certificate = $request->file('certificate');
                $data['certificate']= $certificate->store('/images',['disk' => 'uploads']);
                }

                //img disc

              if($request->hasFile('img_description_size')) {
                $img_disc = $request->file('img_description_size');
                $data['img_description_size']= $img_disc->store('/images',['disk' => 'uploads']);
                }

        //return $data;
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

       $variant = $request->variant;
       $product->variants()->delete();
       foreach ($variant as $variantss) {
            $variants = array(
                'id'=>$variantss['id_variant'],
               'product_id' => $product->id,
               'code_variant' => $variantss['code_variant'],
               'price_variant' => $variantss['price_variant'],
               'quantity_variant' => $variantss['quantity_variant'],

           );
          // return $variants;


           $variant_update = Variant::Create($variants);

           $variant_options_size = array(
               'variants_id' => $variant_update->id,
               'option' => 'size',
               'value' => $variantss['size'],
           );
           $variant_update->option()->where('option','size')->create($variant_options_size);
           $variant_options_color = array(
               'variants_id' => $variant_update->id,
               'option' => 'color',
               'value' => $variantss['color'],
           );
           $variant_update->option()->where('option','color')->create($variant_options_color);
       }

        if($prevImg){

            Storage::disk('uploads')->delete($prevImg);
        }
        return redirect()->route('admin.products.index')->with('success','???? ?????????? ???????????? ??????????');
    }

    public function restore($id){

        $product = Product::withTrashed()->findOrFail($id);

            $product->restore();

            return redirect()->route('admin.products.index')->with('success','???? ?????????????? ???????????? ??????????');
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
       $this->authorize('delete',$product);

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

       return redirect()->route('admin.products.index')->with('success','???? ?????? ???????????? ??????????');

    }

    public function deleteImage($id){
            $image = ProductImage::find($id);
            $product = Product::find($id);

            if ($image) {
                if($image->image_path){

                    Storage::disk('uploads')->delete($image->image_path);
                    $image->delete();
                    return response()->json('success',200);
                }
            }

            if ($product) {
                if ($product->certificate) {
                    Storage::disk('uploads')->delete($product->certificate);
                    $product->certificate = null;
                    $product->save();
                    return response()->json('success',200);
                }
            }

    }
}
