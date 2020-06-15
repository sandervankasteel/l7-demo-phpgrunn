<?php

namespace App\ValueObjects;

use Illuminate\Support\Facades\Http;

class Address {

    private $longitude;
    private $latitude;

    private $address_line_one;
    private $address_line_two;

    private $country;

    private $city;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;

        $this->populateAddressDetails($latitude, $latitude);
    }

    public function addressLineOne()
    {
        return $this->address_line_one;
    }

    public function addressLineTwo()
    {
        return $this->address_line_two;
    }

    public function country()
    {
        return $this->country;
    }

    public function city()
    {
        return $this->city;
    }

    /**
     * Populates the rest of the object with the address details from Google maps
     * @param $latitude
     * @param $longitude
     */
    private function populateAddressDetails($latitude, $longitude)
    {
        $mapsApiKey = config('maps.api_key');

        $data = Http::get(
            "https://maps.googleapis.com/maps/api/geocode/json?
            latlng={$latitude},{$longitude}&key={$mapsApiKey}"
        )->object();

        dd($data);

//        if($data->status !== 'OK') {
//            throw new \Exception("Google Maps API failed");
//        }

    }
}
