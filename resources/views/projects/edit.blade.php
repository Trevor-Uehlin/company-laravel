<x-app-layout>


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
                <x-label for="organization" :value="__('Organization')" />

                <x-input id="organization" class="block mt-1 w-full" type="text" name="organization" :value="$project->organization" required />
            </div>

            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />

                <textarea name="description" id="description" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5">{{$project->description}}</textarea>
            </div>

            <div class="mt-4">
                <x-label for="file" :value="__('Add an Image')" />

                <x-input id="file" class="block mt-1" type="file" name="file" />
            </div>

            <br />

            @foreach ($project->images as $image)
                <img src="{{asset($image->path)}}" alt="{{$image->title}}">
                <a href="{{route('image/delete', $image->id)}}">delete this image</a>
                <br />
                <br />
                <br />
            @endforeach

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Save Project') }}
                </x-button>
            </div>
            
            <br />
            
        </form>
    </div>



</x-app-layout>