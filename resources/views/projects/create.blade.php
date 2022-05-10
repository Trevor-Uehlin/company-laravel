<x-app-layout>

    <link rel="stylesheet" href="{{asset('css/page-specific/projects.css')}}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a new project') }}
        </h2>
    </x-slot>

    <br />
    <br />

    <div class="container">
        <form method="POST" class="mb-4" action="{{route("projects.store")}}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('name')" required autofocus />
            </div>
            
            <div class="mt-4">
                <x-label for="url" :value="__('Site URL')" />

                <x-input id="url" class="block mt-1 w-full" type="text" name="url" required />
            </div>

            <div class="mt-4">
                <x-label for="organization" :value="__('Organization')" />

                <x-input id="organization" class="block mt-1 w-full" type="text" name="organization" required />
            </div>

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" name="description" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="file" :value="__('Upload an Image')" />

                <x-input id="file" class="block mt-1 w-full" type="file" name="file" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Save Project') }}
                </x-button>

                <x-button-link href="{{route('projects')}}" class="ml-2">{{__('Cancel')}}</x-button-link>
            </div>
            
        </form>
    </div>



</x-app-layout>