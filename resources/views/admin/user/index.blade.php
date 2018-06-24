@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('delete_user'))
    
<p class="bg-danger">{{session('delete_user')}}</p>

@endif



<h1>Show User</h1>
<a href="{{route('user.create')}}">Create user</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @if($users)
            @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/imgplaceholder.jpg'}}"></a></td>
            <!--link to show--> 
            <td><a href="/Admin/user/{{$user->id}}">{{$user->name}}</a></td>
            <!--link to edit-->
            <td><a href="{{route('user.edit',$user->id)}}">{{$user->email}}</a></td>
            <td>{{ $user->role ? $user->role->name : '-' }}</td>
            <td>{{$user->active==1?'active':'not active'}}</td>
            <td>{{$user->created_at ? $user->created_at->diffForHumans():'-'}}</td>
            <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : '-'}}</td>
        </tr>
            @endforeach
        @endif
    </tbody>
</table>


@stop