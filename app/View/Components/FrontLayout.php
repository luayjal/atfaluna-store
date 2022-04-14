<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

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
        
        $deliverys= DB::table('delivery_agents')
        ->join('users', 'users.id', '=', 'delivery_agents.user_id')
        ->select('name'
            ,DB::raw('(select avg(eval) from delivery_evaluations where delivery_evaluations.delivery_id = delivery_agents.id) as sum')
        )->get();
        //dd($deliverys);
        return view('layouts.front-layout',[
            'categories' => $categories,
            'cart' => $cart,
            'deliverys' => $deliverys
        ]);
    }
}
