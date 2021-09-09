<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\follower;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserprofileController extends Controller
{
    Public function userprofile(Request $request, $name,$data = null){
        if($request->ajax()){
           if ($data == 1) {
                $data = User::Where(['name'=>$name])->get();
                $follow = follower::where(['follow_id'=>$data['0']->id ,'user_id' => session()->get('user')['id']])->get();
                return view('front.userprofile.userpost',['post'=>$data,'follow'=>$follow]);
           }

            $data = User::Where(['name'=>$name])->get();
            $follow = follower::where(['follow_id'=>$data['0']->id ,'user_id' => session()->get('user')['id']])->get();
            return view('front.userprofile.unfollow-follow',['post'=>$data,'follow'=>$follow]);
        }
        $data = User::Where(['name'=>$name])->get();
        $follow = follower::where(['follow_id'=>$data['0']->id ,'user_id' => session()->get('user')['id']])->get();
        // dd($follow);
     return view('front.userprofile.profile',['post'=>$data,'follow'=>$follow]);
    }
}
