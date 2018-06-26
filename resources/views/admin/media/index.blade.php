@extends('layouts.admin')

@section('content')

<h1>Media</h1>
@if($photos)


{!! Form::open(['method'=>'DELETE','action'=>'AdminMediaController@deleteMedia','class'=>'form-inline'])!!}
    
    <div class="form-group">
        <select name="checkBoxArray" id="" class="form-control">
            <option value="">Delete</option>
        </select>
    </div>
    <div class="form-group">
        {!! Form::submit('submit',['class' => 'btn-primary'])!!}
    </div>

<table class="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($photos as $photo)
        <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
            <td>{{$photo->id}}</td>
            <td><img height="50px" src="{{$photo->file ? $photo->file : 'imagplaceholder.jpg'}}"></td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() :'-'}}</td>
            <td>
                
                
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! Form::close()!!}

@endif
@stop

@section('scripts')
<script>
        
        $(document).ready(function(){
            
            $('#options').click(function(){
                
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    })
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    })
                }
                
                console.log('helo')
            });
            
        });
   
        
 

</script>
@stop