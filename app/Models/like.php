<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table= 'likes';
    protected $fillable = ['user_id','post_id'];
    use HasFactory;

    public function like(){
        return $this->belongsTo('App\Models\Post');
    }
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function likeds(){
        return $this->hasMany('App\Models\Post','id','post_id');
    }
}
