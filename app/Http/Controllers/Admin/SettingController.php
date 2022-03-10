<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function aboutUs(){
        return view('dashboard.setting.about-us',[
            'about_us'=> AboutUs::first()
        ]);
    }
    public function updateAboutUS(Request $request){
        $data = $request->all();
        $about_us = AboutUs::first();
        $prevImg = false;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $data['image'] = $file->store('/images',['disk' => 'uploads']);
            $prevImg = $about_us->image;
        }

        if ($about_us == null) {
            AboutUs::create($data);
        }
        else {
            $about_us->update($data);
        }

        if($prevImg){

            Storage::disk('uploads')->delete($prevImg);
        }

        return redirect()->back();
    }

}
