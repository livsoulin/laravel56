@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('delete_category'))
    
<p class="bg-danger">{{session('delete_category')}}</p>

@endif
    
<h1>category</h1>

<div class="col-sm-6">
    {!! Form::open(['method'=>'POST','action'=>'AdminCategoryController@store'])!!}
        <div class="form-group">
            {!! Form::label('name','Name')!!}
            {!! Form::text('name',null,['class'=>'form-control'])!!} 
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category',['class' => 'btn btn-primary'])!!}
        </div>
    {!! Form::close()!!}
</div>

<div class="col-sm-6">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            @if($category)           
                @foreach($category as $categories)       
                <tr>
                    <td>{{$categories->id}}</td>
                    <td><a href="{{route('category.edit',$categories->id)}}">{{$categories->name}}</a></td>
                    <td>{{$categories->created_at ? $categories->created_at->diffForHumans() : '-'}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>   
</div>     
@stop