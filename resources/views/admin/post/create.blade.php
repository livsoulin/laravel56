@extends('layouts.admin')

@section('content')

@include('include.tinyeditor')


@if(Session::has('create_post'))
    <p class="bg-primary">{{session('create_post')}}</p>
@endif
<h1>Create Post</h1>


<div class="row">
{!! Form::open(['method'=>'POST','action'=>'PostController@store','files' => true]) !!}


    <div class="form-group">
        {!! Form::label('title','Title')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!} 
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category')!!}
        {!! Form::select('category_id',$category,null,['placeholder'=>'option','class'=>'form-control'])!!} 
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Photo')!!}
        {!! Form::file('photo_id',null,['class'=>'form-control'])!!} 
    </div>
    <div class="form-group">
        {!! Form::label('body','Body:')!!}
        {!! Form::textarea('body',null,['class'=>'form-control'])!!} 
    </div>

    <div class="form-group">
        {!! Form::submit('Create post',['class' => 'btn btn-primary'])!!}
    </div>
    {!! Form::close()!!}
</div>

<div class="row">
<!--alert error--> 
<!--include file error from folder include-->
    @include('include.form_error')
</div>


@stop
