@extends('layouts.admin')

@section('content')
<h1>Update User</h1>

<div class="row">
    <div class="col-sm-3">

        <img src="{{$user->photo ? $user->photo->file : '/images/imgplaceholder.jpg'}}" class="img-responsive img-rounded">


    </div>

    <div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id],'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name','Name')!!}
            {!! Form::text('name',null,['class'=>'form-control'])!!} 
        </div>

        <div class="form-group">
            {!! Form::label('email','Email')!!}
            {!! Form::text('email',null,['class'=>'form-control'])!!} 
        </div>

        <div class="form-group">
            {!! Form::label('role_id','Role')!!}
            {!! Form::select('role_id', $roles, null,['placeholder' => 'choose option','class'=>'form-control'])!!} 
        </div>

        <div class="form-group">
            {!! Form::label('is_active','Active')!!}
            {!! Form::select('is_active',array(1=>'active',0=>'not active'),null,['class'=>'form-control'])!!} 
        </div>
        <!--upload photo or files-->
        <div class="form-group">
            {!! Form::label('photo_id','Photo')!!}
            {!! Form::file('photo_id',null,['class'=>'form-control'])!!} 
        </div>

        <div class="form-group">
            {!! Form::label('password','Password')!!}
            {!! Form::password('password',null,['class'=>'form-control'])!!} 
        </div>

        {!! Form::token() !!}
        <div class="form-group">
            {!! Form::submit('Update User',['class' => 'btn btn-primary col-sm-6'])!!}
        </div>
    {!! Form::close()!!}
    
    
    
    
    <!--form destroy-->
    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]])!!}
    
    <div class="form-group">
        {!! Form::submit('Delete User',['class' => 'btn btn-danger col-sm-6'])!!}
    </div>
    {!! Form::close()!!}
    
    
    </div>
</div>

<div class="row">

<!--alert error--> 
<!--include file error from folder include-->
@include('include.form_error')

</div>

@stop
