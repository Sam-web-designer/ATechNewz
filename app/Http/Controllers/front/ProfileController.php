<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use  Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\Models\follower;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class ProfileController extends Controller
{
    public function profile_image_change(Request $request){
        $userid = session()->get('user');
        $avatar = $request->file('avatar');
        if ($userid->avatar) {
             $path =   'storage/userimage/'.$userid->avatar;
                if(File::exists($path)){
                    unlink($path);
                }
        }
        $filename = time() . '.' .$avatar->Extension();
        $avatar->move(('storage/userimage/'), $filename);
         $thumbnailpath = ('storage/userimage/'.$filename);
        $img = Image::make($thumbnailpath)->resize(600, 500, function($constraint) {
            $constraint->aspectRatio();
        });
        $img->fit(250);
        $img->save($thumbnailpath);

        $user = session()->get('user');
        $user->avatar = $filename;
        $user->save();
      
       
        return redirect()->back();
    }
    public function user_pass_update(Request $request){
        $user = User::where(['id'=>session()->get('user')['id']])->first();
        $user->pass=$request->pass;
        $user->save();
       return redirect()->back()->with('msg','Your password has been changed'); 
    }

    public function following_post(Request $request){
        $data = new follower;
        $data->follow_id=$request->follow_id;
        $data->user_id=session()->get('user')['id'];
        $data->save();
        return response()->json([
            'bool'=>true
        ]);
    }
    public function followdelete($id){
        $data = follower::find($id);
        $data->delete();
        return response()->json([
            'bool'=>true
        ]);
    }

    public function followinglist(Request $request){
            if($request->ajax()){
                    $user = User::where(['id'=>session()->get('user')['id']])->get();
                    $data = $user['0']->follow;
                    return view('front.myprofile.following-list',['data'=>$data]);
            }
        $user = User::where(['id'=>session()->get('user')['id']])->get();
        $data = $user['0']->follow;
       return view('front.myprofile.following',['data'=>$data]);
    }
    public function following(Request $request){
        if($request->ajax()){
            $user = User::where(['id'=>session()->get('user')['id']])->get();
            $data = $user['0']->follow;
           return view('front.userprofile.userfollow-like',['data'=>$data]);
        }

        $user = User::where(['id'=>session()->get('user')['id']])->get();
        $data = $user['0']->follow;
       return view('front.userprofile.followpost',['data'=>$data]);
    }
    public function follow(Request $request){
        $user = User::where(['id'=>session()->get('user')['id']])->first();
        $data = follower::where(['follow_id'=>$user->id])->get();
        //$follow = follower::where(['follow_id'=>$data['0']->id ,'user_id' => session()->get('user')['id']])->get();
        return view('front.myprofile.follow',['data'=>$data]);
    }
}
