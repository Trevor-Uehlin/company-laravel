<x-app-layout>

    <x-custom.sub-content-area>
        I am using openweathermap.org's api for the weather, and ipapi.com for the location.  I think they both may be a little off.
    </x-custom.sub-content-area>


    <x-custom.sub-content-area>

        <h3>Showing the weather for {{$weather->city . ", " . $weather->state}}...or at least close to it.</h3>
        <p>Mostly: {{$weather->mostly}}.</p>
        <p>Description: {{$weather->description}}</p>
        <p>Current Temperature: {{$weather->currentTemp}}&#8457;</p>
        <p>Max Temperature: {{$weather->maxTemp}}&#8457;</p>
        <p>Min Temperature: {{$weather->minTemp}}&#8457;</p>
        <p>Pressure: {{$weather->pressure}}</p>
        <p>Humidity: {{$weather->humidity}}&#37;</p>
        <p>Wind Speed: {{$weather->windSpeed}} mph</p>
        <p>Wind Gust: {{$weather->windGust}} mph</p>
        <p>Visibility: {{$weather->visibility}} miles</p>
        <p>Sunrise: {{$weather->sunrise}} (this is way off)</p>
        <p>Sunset: {{$weather->sunset}} (this is way off)</p>

    </x-custom.sub-content-area>

</x-app-layout>