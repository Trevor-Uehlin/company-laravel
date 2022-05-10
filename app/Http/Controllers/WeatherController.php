<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller {

    public function index() {

        $user_ip = $_SERVER['REMOTE_ADDR'];

        var_dump($user_ip);exit;

        var_dump($request('latitude'));exit;
        return view("playground.weather.index");



        // $lat = "44.052151";
        // $lon = "-123.091187";
        // $apiKey = env("OPEN_WEATHER_MAP_API_KEY");

        // $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey";

        // $response = Http::get("$url");

        // $weather = $response->json();

        // return view("playground.weather", compact("weather"));

        //var_dump($response->json());exit;
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
