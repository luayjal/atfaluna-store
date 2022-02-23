<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\View\Component;

class FrontLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = Category::where('status','active')->whereDoesntHave('parent')->get();
        $cart = Cart::where('cart_id' , cart_id())->get();
        return view('layouts.front-layout',[
            'categories' => $categories,
            'cart' => $cart
        ]);
    }
}
