<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\View\Component;

class UpcomingEvents extends Component
{
    public $events;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->events = Event::future()->limit(10)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.upcoming-events');
    }
}
