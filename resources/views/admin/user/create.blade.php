@extends('layouts.admin')

@section('content')
<h1>Create User</h1>

{!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files' => true]) !!}


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
    {!! Form::submit('Create User',['class' => 'btn btn-primary'])!!}
</div>
{!! Form::close()!!}

<!--alert error--> 
<!--include file error from folder include-->
@include('include.form_error')



@stop
