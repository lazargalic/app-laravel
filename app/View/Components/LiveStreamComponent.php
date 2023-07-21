<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LiveStreamComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $first_name;
    public $last_name;
    public $categories;
    public $country;


    public function __construct($first_name, $last_name, $categories, $country)
    {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->categories=$categories;
        $this->country=$country;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.live-stream-component');
    }
}
