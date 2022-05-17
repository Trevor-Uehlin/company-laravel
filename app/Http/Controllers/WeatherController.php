<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WeatherController extends Controller {

    public function index() {

        //$user_ip = $_SERVER["REMOTE_ADDR"];
        $user_ip = "73.67.251.164";
        $ipapiKey = env("IPAPI_API_KEY");

        $locationUrl = "http://api.ipapi.com/$user_ip?access_key=$ipapiKey";
        $locationInfo = Http::get($locationUrl)->json();
        
        if(!empty($locationInfo['error'])) throw new \Exception("Location Error: " . $locationInfo["reason"]);

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
        $parsed->state = $location["region_code"];
        $parsed->mostly = $weather['weather'][0]['main'];
        $parsed->description = $weather['weather'][0]['description'];
        $parsed->icon = $weather['weather'][0]['icon'];
        $parsed->currentTemp = floor($this->toFarenheit($weather['main']['temp']));
        $parsed->minTemp = floor($this->toFarenheit($weather['main']['temp_min']));
        $parsed->maxTemp = floor($this->toFarenheit($weather['main']['temp_max']));
        $parsed->pressure = $weather['main']['pressure'];
        $parsed->humidity = $weather['main']['humidity'];
        $parsed->visibility = substr($weather['visibility'], 0, 2);
        $parsed->windSpeed = $weather['wind']['speed'];
        $parsed->windGust = empty($weather['wind']['gust']) ? 0 : $weather['wind']['gust'];


        $sunrise = new Carbon(($weather['sys']['sunrise'] * 1000));
        $formated = $sunrise->format("g:i A");
        $parsed->sunrise = $formated;

        $sunset = new Carbon(($weather['sys']['sunset'] * 1000));
        $formated = $sunset->format("g:i A");
        $parsed->sunset = $formated;

        return $parsed;
    }


    public function toFarenheit($temp) {

        return ($temp * 9/5) + 32;
    }
}



