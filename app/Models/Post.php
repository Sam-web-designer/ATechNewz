<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ['post_id','user_id','name','pending-confirm','category'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    // public function users(){
    //     return $this->hasMany('App\Models\User')->orderby('id','desc');
    // }
 

    public function images()
    {
    	return $this->hasMany('App\Models\Imagepost');
    }
    public function videos()
    {
    	return $this->hasMany('App\Models\post_video');
    }
    function comments(){
        return $this->hasMany('App\Models\post_comments')->orderBy('id','desc');
    }
    function post_comment(){
        return $this->belongsTo('App\Models\post_comments','id','post_id');
    }
    function likes(){
        return $this->hasMany('App\Models\like')->orderBy('id','desc');
    }
    // public function likes()
    // {
    //     return $this->hasMany(Like::class,'post_id');
    // }
}
