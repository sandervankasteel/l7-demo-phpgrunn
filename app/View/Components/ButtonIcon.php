<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonIcon extends Component
{
    public $type;

    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $icon)
    {
        $this->type = $type;

        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button-icon');
    }
}
