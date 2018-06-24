@extends('layouts.blog-post')

@section('content')

      

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{!! $post->body !!}</p>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    @if(Session::has('comment_message'))
                        
                        {{Session('comment_message')}}
                  
                    @endif
                    
                    <h4>Leave a Comment:</h4>
                    
                        {!! Form::open(['method'=>'PITCH','action'=>'PostCommentController@store'])!!}
                        
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        
                        <div class="form-group">
                            {!! Form::label('body','Body:')!!}
                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!} 
                        </div>

                       
                        <div class="form-group">
                            {!! Form::submit('Submit comment',['class' => 'btn btn-primary'])!!}
                        </div>
                        {!! Form::close()!!}
                    
                    
                </div>

                <hr>

            <!-- Posted Comments -->

            @if(count($comments) > 0)
                <!-- Comment -->
                
                @foreach($comments as $comment)
                
                <div class="media col-sm-12">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$comment->photo_id ? $comment->photo->file : '/images/imgplaceholder.jpg'}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        <p> {{$comment->body}}</p>   
                        
                        
                        @if(count($comment->replies) > 0)
                            
                            @foreach($comment->replies as $reply)
                            
                            @if($reply->is_active == 1)
                        
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="64" src="{{$reply->photo_id ? $reply->photo->file : '/images/imgplaceholder.jpg'}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author}}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$reply->body}}</p>
                            </div>
                             @endif
                            @endforeach
                        @endif
                        
                                
                        
                        <!--code commentReply-->
                            
                            
                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply'])!!}
                                
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                            
                                <div class="form-group">
                                    {!! Form::label('body',' ')!!}
                                    {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=> 'reply comment', 'rows' => 1])!!} 
                                </div>

                                
                                <div class="form-group">
                                    {!! Form::submit('submit',['class' => 'btn btn-primary'])!!}
                                </div>
                            
                            {!! Form::close()!!}
                            
                        </div>
                        <!-- End Nested Comment -->
                        
                       
                    </div>
                </div>
                @endforeach
            @endif
                

@stop