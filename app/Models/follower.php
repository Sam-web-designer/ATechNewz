<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class follower extends Model
{
    use HasFactory;
    protected $table="followers";
    protected $filable=['user_id','follow_id'];


    public function follow(){
        return $this->belongsTo('App\Models\User');
    }
    public function userlists(){
        return $this->hasMany('App\Models\User','id','follow_id');
    }
    public function following(){
        return $this->hasMany('App\Models\User','id','user_id');
    }
}
