<x-app-layout>
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

                <div class="image-container">
                    <div id="project-{{$project->id}}-carousel" class="carousel slide" data-bs-ride="carousel">

                        {{-- <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div> --}}

                        
        
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
        
        
        
                        {{-- <button class="carousel-control-prev" type="button" data-bs-target="#project-{{$project->id}}-carousel" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
        
                        <button class="carousel-control-next" type="button" data-bs-target="#project-{{$project->id}}-carousel" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button> --}}
        
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
























        
            {{-- <div class="image-list-container">
                @foreach ($project->images as $image)
                    <div class="image-container">
                        <img src="{{asset($image->path)}}" alt="{{$image->title}}">
                    </div>
                @endforeach
            </div> --}}


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
            @endauth
        </x-custom.sub-content-area>
    
    @endforeach
</x-app-layout>