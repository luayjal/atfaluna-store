<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Advertising;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings = Advertising::latest()->paginate(5);
        return view('dashboard.advertising.index', [
            'advertisings' => $advertisings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Product::select('id', 'name')->get();
        return view('dashboard.advertising.create', [
            'products' => $products,
            'advertising' => new Advertising()
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
            'product_id' => 'required|exists:products,id',
            'video' => 'required',
            'status' => 'required',
        ], [
            'required' => 'حدث خطأ ! الرجاء عدم ترك هذا الحقل فارغ'
        ]);

        $data = $request->all();

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $data['video'] = $file->store('/video', ['disk' => 'uploads']);
        }

        Advertising::create($data);
        return redirect()->route('admin.advertising.index')->with('success', 'تم اضافة الفيديو بنجاح');
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
        //
        $products = Product::select('id', 'name')->get();
        $advertising = Advertising::findOrFail($id);

        return view('dashboard.advertising.edit', [
            'products' => $products,
            'advertising' => $advertising
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
            'product_id' => 'required|exists:products,id',
            'status' => 'required',
        ], [
            'required' => 'حدث خطأ ! الرجاء عدم ترك هذا الحقل فارغ'
        ]);
        $advertising = Advertising::findOrFail($id);

        $data = $request->all();
        $prev_video = false;
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $data['video'] = $file->store('/video', ['disk' => 'uploads']);
            $prev_video = $advertising->video;
        }

        $advertising->update($data);
        if ($prev_video) {

            Storage::disk('uploads')->delete($prev_video);
        }
        return redirect()->route('admin.advertising.index')->with('success', 'تم تعديل الفيديو بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertising = Advertising::findOrFail($id);
        $video = false;
        if ($advertising->video) {

            $video = $advertising->video;
        }

        $advertising->delete();
        if ($video) {

            Storage::disk('uploads')->delete($video);
        }

        return redirect()->route('admin.advertising.index')->with('success', 'تم حذف الفيديو بنجاح');
    }
}
