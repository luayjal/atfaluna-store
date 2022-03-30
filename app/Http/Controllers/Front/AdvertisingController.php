<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings = Advertising::latest()->paginate();
        return view('front.advertising',[
            'advertisings' => $advertisings
        ]);
    }


}
