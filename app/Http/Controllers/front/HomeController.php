<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Image;
use App\Models\post_comments;
use App\Models\like;
use App\Models\post_video;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use  Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
                $data = Post::where(['confirm'=>1])->orderByDesc('id')->get();
                return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where(['confirm'=>1])->orderByDesc('id')->get();
        return view('front.index',['post'=>$data]);
    }



    public function myprofile(Request $req){
            if($req->ajax()){
                $data = User::where(['id' =>session()->get('user')['id']])->get();
                return view('front.myprofile.post',['post'=>$data]);
            }
            $data = User::where(['id' =>session()->get('user')['id']])->get();
          return view('front.myprofile.profile',['post'=>$data]);
    }

    public function pendingpost(Request $request){
        if($request->ajax()){
            $data = Post::where(['confirm'=>1])->orderByDesc('id')->get();
            return view('front.post.like-index',['post'=>$data]);
        }
        $user = User::where(['id'=>session()->get('user')['id']])->get();
        $data = Post::where(['user_id'=>$user['0']->id,'confirm'=>0])->orderByDesc('created_at')->get();
        return view('front.post.pending-post',['post'=>$data]);
    }
   

    public function mobile(Request $req){
        if($req->ajax()){
            $data = Post::where(['category' => 'mobile','confirm'=>1])->get();
            return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where(['category' => 'mobile','confirm'=>1])->get();
         return view('front.post.item.mobile',['post'=>$data]);
    }

    public function computer(Request $req){
        if($req->ajax()){
            $data = Post::where([ 'category' => 'Laptop&Computer','confirm'=>1])->get();
            return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where([ 'category' => 'Laptop&Computer','confirm'=>1])->get();
        return view('front.post.item.computer',['post'=>$data]);
    }
    public function tv(Request $req){
        if($req->ajax()){
            $data = Post::where([ 'category' => 'Tv','confirm'=>1])->get();
            return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where([ 'category' => 'Tv','confirm'=>1])->get();
        return view('front.post.item.tv',['post'=>$data]);
    }
    public function games(Request $req){
        if($req->ajax()){
            $data = Post::where([ 'category' => 'games','confirm'=>1])->get();
            return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where([ 'category' => 'games','confirm'=>1])->get();
        return view('front.post.item.games',['post'=>$data]);
    }
    public function Accessories(Request $req){
        if($req->ajax()){
            $data = Post::where([ 'category' => 'Accessories','confirm'=>1])->get();
             return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where([ 'category' => 'Accessories','confirm'=>1])->get();
        return view('front.post.item.accessories',['post'=>$data]);
    }
    public function suggestion(Request $req){
        if($req->ajax()){
            $data = Post::where([ 'category' => 'Suggestion','confirm'=>1])->get();
             return view('front.index-post',['post'=>$data]);
        }
        $data = Post::where([ 'category' => 'Suggestion','confirm'=>1])->get();
        return view('front.post.item.suggestion',['post'=>$data]);
    }


}
