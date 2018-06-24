@extends('layouts.admin')

@section('content')


@if(Session::has('delete_post'))
    <p class="bg-danger">{{session('delete_post')}}</p>
@endif

<h1>Posts</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>photo</th>
            <th>Owner</th>
            <th>category</th>
            <th>title</th>
            <th>body</th>
            <th>created_at</th>
            <th>Updated_at</th>
            <th>Post links</th>
            <th>Comment</th>
        </tr>
    </thead>
    <tbody>
        @if($posts)
            @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo_id ? $post->photo->file : '/images/imgplaceholder.jpg'}}"></a></td>
            <!--link to edit-->
            <td><a href="{{route('post.edit',$post->id)}}">{{$post->user_id ? $post->user->name : '-'}}</a></td>
            
            <td>{{$post->category_id? $post->category->name :'-'}}</a></td>
            
            <td>{{ $post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at ? $post->created_at->diffForHumans():'-'}}</td>
            <td>{{$post->updated_at ? $post->updated_at->diffForHumans() : '-'}}</td>
            <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
            <td><a href="{{route('comments.show',$post->id)}}">View comment</a></td>
           
        </tr>
            @endforeach
        @endif
    </tbody>
</table>

<div class="col-sm-6">
    {{$posts->render()}}
</div>


@stop