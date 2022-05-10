<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller {

    public function index() {

        $user_ip = $_SERVER["REMOTE_ADDR"];
        //$user_ip = "73.67.251.164";

        $locationUrl = "https://ipapi.co/$user_ip/json/";
        $locationInfo = Http::get($locationUrl)->json();

        $lat = $locationInfo["latitude"];
        $lon = $locationInfo["longitude"];
        $apiKey = env("OPEN_WEATHER_MAP_API_KEY");

        $weatherUrl = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";
        $weatherInfo = Http::get($weatherUrl)->json();

        $weather = $this->parse($locationInfo, $weatherInfo);

        return view("playground.weather.index", compact("weather"));
    }


    public function parse($location, $weather) {

        $parsed = new \stdClass();
        $parsed->city = $location["city"];
        $parsed->state = $location["region"];
        $parsed->mostly = $weather['weather'][0]['main'];
        $parsed->description = $weather['weather'][0]['description'];
        $parsed->icon = $weather['weather'][0]['icon'];
        $parsed->currentTemp = floor($this->toFarenheit($weather['main']['temp']));
        $parsed->minTemp = floor($this->toFarenheit($weather['main']['temp_min']));
        $parsed->maxTemp = floor($this->toFarenheit($weather['main']['temp_max']));
        $parsed->pressure = $weather['main']['pressure'];
        $parsed->humidity = $weather['main']['humidity'];
        $parsed->visibility = $weather['visibility'];
        $parsed->windSpeed = $weather['wind']['speed'];
        $parsed->windGust = $weather['wind']['gust'];
        $parsed->sunrise = $weather['sys']['sunrise'];
        $parsed->sunset = $weather['sys']['sunset'];

        return $parsed;
    }


    public function toFarenheit($temp) {

        return ($temp * 9/5) + 32;
    }


    public function create() {}

    public function store(Request $request) {

        $ip = $request->ip();

        var_dump($request->latitude);exit;
    }

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}


}



