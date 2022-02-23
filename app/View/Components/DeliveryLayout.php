<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeliveryLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $header;
    public function __construct($header)
    {
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Delivery.layouts.delivery-layout');
    }
}
