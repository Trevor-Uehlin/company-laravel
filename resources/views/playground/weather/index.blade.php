<x-app-layout>


    <x-custom.sub-content-area>

        <form method="POST" action="{{route('weather.store')}}">
            @csrf
        
            <input type="text">

            <x-button>Show Weather</x-button>
        </form>

    </x-custom.sub-content-area>

</x-app-layout>