<?php

namespace App\Http\Controllers\Front;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReturnPolicyController extends Controller
{
  public  function index() {
    $iformations = AboutUs::first();
        return view('front.Return-policy',[
            'iformations'=>$iformations
        ]);
        }
}
