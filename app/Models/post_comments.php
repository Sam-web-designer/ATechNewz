<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_comments extends Model
{
    protected $table = "post_comments";
    protected $fillable = ['post_id','user_id','comments','slug'];
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    function replycomments(){
        return $this->hasMany('App\Models\Reply_comments','comment_id');
    }
    public function replycomment(){
        return $this->belongsTo('App\Models\Reply_comments');
    }
    public function postcomments(){
        return $this->hasMany('App\Models\Post','id','post_id');
    }
}
