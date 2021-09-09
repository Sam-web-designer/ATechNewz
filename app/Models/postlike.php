<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postlike extends Model
{
    Protected $table="postlikes";
    Protected $fillable = ['user_id','post_id'];
    use HasFactory;
}
