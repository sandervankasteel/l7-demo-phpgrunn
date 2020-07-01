<?php

namespace App\View\Components;

use App\ValueObjects\Address;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Weather extends Component
{
    private $dateTime;

    private $address;

    public $prediction = null;

    /**
     * Create a new component instance.
     *
     * @param Carbon $dateTime
     * @param Address $address
     */
    public function __construct(Address $address, Carbon $dateTime)
    {
        $this->address = $address;
        $this->dateTime = $dateTime;

        $this->weatherPrediction();
    }

    protected function weatherPrediction()
    {
        $longitude = $this->address->longitude();
        $latitude = $this->address->latitude();
        $apiKey = config('services.openweather.api_key');

        $response = Http::get(
            "https://api.openweathermap.org/data/2.5/forecast/daily?lat=$latitude&lon=$longitude&cnt=16&appid=$apiKey"
        )->json();
        $difference = Carbon::now()->diffInDays($this->dateTime);

        if($difference < 16) {
            $this->prediction = Arr::get($response, "list.$difference.weather.0.description");
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.weather');
    }
}
