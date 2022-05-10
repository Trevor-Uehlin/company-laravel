<x-app-layout>


    <x-custom.sub-content-area>

        <h3>Showing the weather for {{$weather->city . ", " . $weather->state}}...or at least close to it.</h3>
        <p>Mostly: {{$weather->mostly}}.</p>
        <p>Description: {{$weather->description}}</p>
        <p>Current Temperature: {{$weather->currentTemp}}&#8457;</p>
        <p>Max Temperature: {{$weather->maxTemp}}&#8457;</p>
        <p>Min Temperature: {{$weather->minTemp}}&#8457;</p>
        <p>Pressure: {{$weather->pressure}}</p>
        <p>Humidity: {{$weather->humidity}}</p>
        <p>Wind Speed: {{$weather->windSpeed}} mph</p>
        <p>Wind Gust: {{$weather->windGust}} mph</p>
        <p>Visibility: {{$weather->visibility}} miles</p>
        <p>Sunrise: {{$weather->sunrise}}</p>
        <p>Sunset: {{$weather->sunset}}</p>

    </x-custom.sub-content-area>

</x-app-layout>