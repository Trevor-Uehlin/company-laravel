<x-app-layout>

    <link rel="stylesheet" href="{{asset('css/page-specific/projects.css')}}">
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Here are some of the projects that I have been working on.') }}
            
            @auth
                @if(auth()->user()->isAdministrator())
                    <a href="{{route("projects.create")}}" class="float-right"><i class="fa fa-plus" style="font-size:35px;color:blue;"></i></a>
                @endif
            @endauth
        </h2>
    </x-slot>

    <div class="w-100 text-center bg-light">
        <p>Showing {{count($projects)}} project(s)</p>
    </div>

    @foreach ($projects as $project)

        <x-custom.sub-content-area>

            <p>Published: {{Carbon\Carbon::parse($project->created_at)->format("D, F, Y")}}</p>
            <p class="h4"><strong><a href="{{$project->url}}" style="color: blue;">{{$project->title}}</a></strong></p>
            <p><strong>Organization: </strong>{{$project->organization}}</p>
            <p><strong>Description: </strong>{!! nl2br($project->description) !!}</p>

            <div class="image-list-container">

                <div class="image-container">
                    <div id="project-{{$project->id}}-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
        
                            @php $index = 0; @endphp
                            @foreach ($project->images as $image)
                                @if($index == 0)
                                    <div class="carousel-item active">
                                        <img src="{{asset($image->path)}}" class="d-block w-100" alt="{{$image->title}}">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{asset($image->path)}}" class="d-block w-100" alt="{{$image->title}}">
                                    </div>
                                @endif
                                @php $index++; @endphp
                            @endforeach
        
                        </div>
                    </div>
                </div>
                
                <div class="row w-100">
                    <div class="col text-center">
                        <x-button data-bs-target="#project-{{$project->id}}-carousel" data-bs-slide="prev">
                            <
                        </x-button>
                        <x-button data-bs-target="#project-{{$project->id}}-carousel" data-bs-slide="next">
                            >
                        </x-button>
                    </div>
                </div>

            </div>


            @auth
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

                        @php $confirm = "Are you sure you want to delete this project?"; @endphp
                        <form method="POST" action="{{route("projects.destroy", $project->id)}}" onSubmit="return confirm('{{$confirm}}');">
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
            @endauth
        </x-custom.sub-content-area>
    
    @endforeach
</x-app-layout>