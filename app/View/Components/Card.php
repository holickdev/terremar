<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */

    public $title;
    public $price;
    public $area;
    public $rooms;
    public $baths;
    public $garage;

    public function __construct($title = 0, $price = 0, $area= 0, $rooms=0, $baths=0, $garage=0)
    {
        $this->title = $title;
        $this->price = $price;
        $this->area = $area;
        $this->rooms = $rooms;
        $this->baths = $baths;
        $this->garage = $garage;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
