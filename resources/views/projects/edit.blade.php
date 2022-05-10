<x-app-layout>

    <link rel="stylesheet" href="{{asset('css/page-specific/projects.css')}}">


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit a project') }}
        </h2>
    </x-slot>

    <br />
    <br />

    <div class="container">
        <form method="POST" action="{{route("projects.update", $project->id)}}" enctype="multipart/form-data">
            @method("patch")
            @csrf

            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$project->title" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="url" :value="__('Site URL')" />

                <x-input id="url" class="block mt-1 w-full" type="text" name="url" :value="$project->url" required />
            </div>

            <div class="mt-4">
                <x-label for="organization" :value="__('Organization')" />

                <x-input id="organization" class="block mt-1 w-full" type="text" name="organization" :value="$project->organization" required />
            </div>

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />

                <textarea name="description" id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5">{{$project->description}}</textarea>
            </div>

            <br />

            <div class="row">

                <div class="ml-4">
                    <x-label for="file" :value="__('Add an Image')" />
    
                    <x-input id="file" class="block mt-1" type="file" name="file" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Save Project') }}
                    </x-button>

                    <x-button-link href="{{route('projects')}}" class="ml-2">{{__('Cancel')}}</x-button-link>
                </div>
                
            </div>
            <br />
            
        </form>

            <br />

            <div class="image-list-container">
                <h3>Current Project Images</h3>
                @foreach ($project->images as $image)
                    <div class="image-container">
                        <img src="{{asset($image->path)}}" alt="{{$image->title}}">

                        <form method="POST" class="delete-form" action="{{route("images.destroy", $image->id)}}">
                            @csrf
                            @method("DELETE")
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Delete Image') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>

    </div>



</x-app-layout>