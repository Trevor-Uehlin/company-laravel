<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here are some of the projects that I have been working on.') }}
        </h2>
    </x-slot>

    <x-custom.sub-content-area>
        Showing {{count($projects)}} projects
    </x-custom.sub-content-area>

    @foreach ($projects as $project)

        <x-custom.sub-content-area class="pic-list">

            @auth
                @if(auth()->user()->isAdministrator())
                    <div class="float-right">
                        <a href="{{route("projects.show", $project->id)}}"><i class="fa fa-edit" style="font-size:40px;color:blue;"></i></a>
                        <br />
                        <a href="{{route("project/delete", $project->id)}}" class="delete-button"><i class="fa fa-trash-o" style="font-size:40px;color:red;"></i></a>
                    </div>
                @endif
            @endauth

            <p>Created: {{Carbon\Carbon::parse($project->created_at)->format("D, F, Y")}}</p>
            <p class="h4"><strong>{{$project->title}}</strong></p>
            <p><strong>Organization: </strong>{{$project->organization}}</p>
            <p><strong>Description: </strong>{{$project->description}}</p>
        
            <div style="background-color: blue;">
                @foreach ($project->images as $image)
                    <img src="{{asset($image->path)}}" alt="{{$image->title}}">
                    <br />
                    <br />
                    <br />
                @endforeach
            </div>
        </x-custom.sub-content-area>
    
    @endforeach
</x-app-layout>