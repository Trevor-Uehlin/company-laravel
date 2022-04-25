<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here are some of the projects that I have been working on.') }}
            <a href="{{route("projects.create")}}" class="float-right"><i class="fa fa-plus" style="font-size:35px;color:blue;"></i></a>
        </h2>
    </x-slot>

    <x-custom.sub-content-area>
        Showing {{count($projects)}} project(s)
    </x-custom.sub-content-area>

    @foreach ($projects as $project)

        <x-custom.sub-content-area>

            <p>Created: {{Carbon\Carbon::parse($project->created_at)->format("D, F, Y")}}</p>
            <p class="h4"><strong>{{$project->title}}</strong></p>
            <p><strong>Organization: </strong>{{$project->organization}}</p>
            <p><strong>Description: </strong>{{$project->description}}</p>
        
            <div class="image-list-container">
                @foreach ($project->images as $image)
                    <div class="image-container">
                        <img src="{{asset($image->path)}}" alt="{{$image->title}}">
                    </div>
                @endforeach
            </div>


            @if(auth()->user()->isAdministrator())

                <div class="row">
                    <form action="{{route("projects.show", $project->id)}}">
                        @csrf
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Edit Project') }}
                            </x-button>
                        </div>
                    </form>

                    <form method="POST" class="delete-form" action="{{route("projects.destroy", $project->id)}}">
                        @csrf
                        @method("DELETE")
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Delete Project') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            @endif
        </x-custom.sub-content-area>
    
    @endforeach
</x-app-layout>