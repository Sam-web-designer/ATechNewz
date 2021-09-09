<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PendingController extends Controller
{
    public function adminhome(Request $request ){
        if($request->ajax()){
            $data = Post::where(['confirm'=>0])->get();
            return view('backend.post.include.postview',['post'=>$data]);
        }
        $data = Post::where(['confirm'=>0])->get();
        return view('backend.post.post',['post'=>$data]);
    }
    public function pendingpostopen($id){
        $post = Post::find($id);
        return view('backend.post.pendingpost',['post'=>$post]);
    }
    public function approvepost($id){
        $post = Post::find($id);
        $post->confirm = 1;
        $post->save();
        return redirect()->back();
    }
    public function deletepostadmin($id){
        $post = Post::find($id);
        foreach($post->images as $file){
        Storage::disk('public')->delete('/post/image/' . $file->image);
        }
        $post->delete();
        return response()->json([
            'massage' => 'data deleted successfully'
        ]);
    }
}
