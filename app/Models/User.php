<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class User extends Model
{
    protected $table= 'users';
    protected $fillable = ['role_id','name','email','pass','avatar','email_token','is_verified','trams_policy'];
    use HasFactory;

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    // public function post(){
    //     return $this->belongsToMany('App\Models\Post','user_id');
    // }
    public function follow(){
        return $this->hasMany('App\Models\follower');
    }
    public function follower(){
        return $this->belongsTo('App\Models\follower');
    }
    public function images()
    {
    	return $this->hasMany('App\Models\Image');
    }
    public function postcomments(){
        return $this->hasMany('App\Models\post_comments');
    }
    public function postcomment(){
        return $this->belongsTo('App\Models\post_comments');
    }
    public function replycomments(){
        return $this->hasMany('App\Models\Reply_comments');
    }
    public function replycomment(){
        return $this->belongsTo('App\Models\Reply_comments');
    }   

    function likes(){
        return $this->hasMany('App\Models\like')->orderBy('id','desc');
    }
}
