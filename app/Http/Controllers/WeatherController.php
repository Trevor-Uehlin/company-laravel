<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller {

    public function index() {

        $lat = "44.052151";
        $lon = "-123.091187";
        $apiKey = "feb58d1c860b98ae1a7e498827e2967e";

        $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey";

        $response = Http::get("$url");

        var_dump($response);exit;
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
