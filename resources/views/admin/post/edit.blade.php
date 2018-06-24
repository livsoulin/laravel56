@extends('layouts.admin')

@section('content')
<h1>Edit Post</h1>

@include('include.tinyeditor')

<div class="row">
    <div class="col-sm-3">
        
        <img class="img-responsive img-rounded" src="{{$post->photo_id ? $post->photo->file : '/images/imgplaceholder.jpg'}}">
        
    </div>
    <div class="col-sm-9">
        {!! Form::model($post,['method'=>'PATCH','action'=>['PostController@update',$post->id],'files' => true]) !!}


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
                {!! Form::submit('Update post',['class' => 'btn btn-primary col-sm-6'])!!}
            </div>
        {!! Form::close()!!}
        
        
        <!--form destroy-->
        {!! Form::open(['method'=>'DELETE','action'=>['PostController@destroy', $post->id]])!!}

            <div class="form-group">
                {!! Form::submit('Delete Post',['class' => 'btn btn-danger col-sm-6'])!!}
            </div>
        {!! Form::close()!!}
        
    </div>
</div>

<div class="row">
<!--alert error--> 
<!--include file error from folder include-->
<!--create request-->
    @include('include.form_error')
</div>


@stop
