@extends('layouts.admin')

@section('content')

<h1>Show User</h1>

<a href="{{route('user.edit',$user->id)}}">{{$user->name}}</a>



@stop

