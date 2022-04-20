<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Dashboard') }}
        </h2>
    </x-slot>

    <x-custom.sub-content-area>
        {{__('You are logged in...thank you for registering!')}}
    </x-custom.sub-content-area>

</x-app-layout>
