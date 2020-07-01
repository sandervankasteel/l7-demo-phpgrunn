<?php

namespace App\View\Components;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class EventRSVP extends Component
{
    public $event;

    public $user;

    /**
     * Create a new component instance.
     *
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->user = Auth::user();
        $this->event = $event;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.event-r-s-v-p');
    }

    public function isAttending()
    {
        return ($this->user !== null) ?
            $this->user->attendingEvents->contains('id', $this->event->id)
            : false;
    }
}
