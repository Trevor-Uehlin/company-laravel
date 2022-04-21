<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
            <a href="{{route("users.create")}}" class="float-right"><i class="fa fa-plus" style="font-size:40px;color:blue;"></i></a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    There are currently {{count($users)}} users.
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        @foreach($users as $user)
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            @if($currentUser->isAdministrator())
                                <div class="float-right">
                                    <a href="{{route("users.show", $user->id)}}"><i class="fa fa-edit" style="font-size:40px;color:blue;"></i></a>
                                    <br />
                                    <a href="users/delete/{{$user->id}}" class="delete-button"><i class="fa fa-trash-o" style="font-size:40px;color:red;"></i></a>
                                </div>
                            @endif
                            <p>Created: {{Carbon\Carbon::parse($user->created_at)->format("D, F, Y")}}</p>
                            <p class="h4"><strong>{{$user->name}}</strong></p>
                            <p><strong>Email: </strong>{{$user->email}}</p>
                            <p><strong>User Type: </strong>{{$user->role->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>