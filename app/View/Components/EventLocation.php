<?php

namespace App\View\Components;

use App\ValueObjects\Address;
use Illuminate\View\Component;

class EventLocation extends Component
{
    public $apiKey;

    public $address;

    /**
     * Create a new component instance.
     *
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->address = $address;

        $this->apiKey = config('services.google_maps.api_key');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.event-location');
    }
}
