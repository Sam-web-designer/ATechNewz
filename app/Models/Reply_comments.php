<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reply_comments extends Model
{
    protected $table = "reply_comments";
    protected $fillable = ['comment_id','user_id','reply_comment'];
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function replycomment(){
        return $this->belongsTo('App\Models\post_comments','id','comment_id');
    }
    public function comments(){
        return $this->hasMany('App\Models\post_comments');
    }
}
