<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagepost extends Model
{
    protected $table = "images";
    protected $filable = ['post_id','image'];
    
    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }
}
