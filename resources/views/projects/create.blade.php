
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a New Poject') }}
        </h2>
    </x-slot>

    <br />
    
    <div class="container">
        {!! Form::open(["action" => "App\Http\Controllers\ProjectController@store", "class" => "p-form", "files" => true]) !!}
    
    
        <div class="form-group">
        {!! Form::label("title", "Title") !!}
        {!! Form::text("title", "", ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("description", "Description") !!}
            {!! Form::text("description", "", ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            {!! Form::label("organization", "Organization") !!}
            {!! Form::text("organization", "", ["class" => "form-control"]) !!}
        </div>
    
    
        <div class="form-group">
        {!! Form::file("file") !!}
        </div>
    
        {!! Form::submit("Submit Post", ["class" => "btn btn-primary"]) !!}
    
        {!! Form::close() !!}
    
    
    
        @if(count($errors) > 0)
        <div class="alert-danger alert">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</x-app-layout>