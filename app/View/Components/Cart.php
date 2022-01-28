<?php

namespace App\View\Components;

use App\Models\Cart as CartModel;
use Illuminate\View\Component;

class Cart extends Component
{
    public $carts;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->carts = CartModel::where('cart_id' , cart_id())->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.cart');
    }
}
