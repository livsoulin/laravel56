<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'Comments';
    protected $fillable = ['post_id','author','email','photo_id','body','is_active'];
    
    public function replies(){
        
        return $this->hasMany('App\CommentReply');
        
    }
    
    public function post(){
        
        return $this->belongsTo('App\Post');
        
    }
    public function photo(){
        return $this->belongsTo('App\Photo');
    }
}
