<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_video extends Model
{
    use HasFactory;
    protected $table = "post_videos";
    protected $filable = ['post_id','video'];

    
    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }
}
