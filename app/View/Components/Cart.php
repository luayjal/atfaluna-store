<?php

namespace App\View\Components;

use App\Models\Cart as CartModel;
use Illuminate\View\Component;

class Cart extends Component
{
    public $carts;
    public $gift_carts ;
    public $totalPrice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $cart_id = cart_id();

        $this->carts = CartModel::where([
            'cart_id' => $cart_id,
            'gift_id' => null,
        ])->get();

        $carts = CartModel::where([
            'cart_id' => $cart_id,
            'gift_id' => null,
        ])->get();

        $this->gift_carts = CartModel::where([
            'cart_id' => $cart_id,
            'product_id' => null,
        ])->get();

        $this->totalPrice = $carts->sum(function($item)
        {
            return $item->product->final_price * $item->quantity;
        });
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
