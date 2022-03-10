<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    public function index()
    {
        $iformations = AboutUs::first();
        return view('front.contact',[
            'iformations' =>$iformations,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'msg'=>"required",
            'email'=>"required|email"
        ]);

        Message::create([
            'email'=>$request->email,
            'msg'=>$request->msg,
            'user_id'=>Auth::id()
        ]);

        return redirect()->back()->with('success','تم الارسال بنجاح');
    }

}
