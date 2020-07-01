<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\Http;

class Address {

    private $longitude;
    private $latitude;


    private $country = '';
    private $locality = ''; // Also known as City name, but this is what Google calls it.
    private $postal_code = '';
    private $route = ''; // Also known as streetname, but this is what Google calls it.
    private $street_number = '';

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $this->populateAddressDetails($latitude, $latitude);
    }

    public function longitude(): float
    {
        return (float) $this->longitude;
    }

    public function latitude(): float
    {
        return (float) $this->latitude;
    }

    public function addressLineOne()
    {
        return "{$this->route} {$this->street_number}";
    }

    public function addressLineTwo()
    {
        return "{$this->postal_code}, {$this->locality}";
    }

    public function country()
    {
        return $this->country;
    }
    /**
     * Populates the rest of the object with the address details from Google maps
     * @param $latitude
     * @param $longitude
     */
    private function populateAddressDetails($latitude, $longitude)
    {
        $mapsApiKey = config('services.google_maps.api_key');

        $data = Http::get(
            "https://maps.googleapis.com/maps/api/geocode/json" .
            "?latlng={$latitude},{$longitude}&key={$mapsApiKey}"
        )->object();

        if($data->status === 'OK') {
            foreach($data->results[0]->address_components as $component) {
                $property = $component->types[0];
                if(property_exists(self::class, $property)) {
                    $this->$property = $component->long_name;
                }
            }
        }
    }
}
