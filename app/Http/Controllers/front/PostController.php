<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Imagepost;
use App\Models\post_comments;
use App\Models\like;
use App\Models\post_video;
use App\Models\Reply_comments;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 

class PostController extends Controller
{
        public function post_upload(Request $req){
            $req->validate([
                'name'=>'required',
            ]);
            $data = User::where(['id'=>session()->get('user')['id']])->get();
            if($data['0']->role_id == 'yes'){
                $post = new Post;
                $post->user_id =session()->get('user')['id'];
                $post->name =$req->name;
                $post->category=$req->category;
                $post->confirm=1;
                $post->save();
                
                $empty = $req->file('image');
                
                if(!empty($empty)){
                    
                   
                    foreach($empty as $image)
                    {
                        
                        
                        $imageName = time() . '.' . $image->getClientOriginalName();
                        $image->move(('storage/post/image/'), $imageName);
                        $thumbnailpath = ('storage/post/image/'.$imageName);
                        $img = Image::make($thumbnailpath)->resize(720, 720, function($constraint) {
                            $constraint->aspectRatio();
                        });
                        $img->save($thumbnailpath);
                    
                        $postImage = new Imagepost();
                        $postImage->post_id = $post->id;
                        $postImage->image = $imageName;
                        $postImage->save(); 
                        
                    }
                 
                }
            
                return redirect('/');
            }else{
                $post = new Post;
                $post->user_id =session()->get('user')['id'];
                $post->name =$req->name;
                $post->category=$req->category;
                $post->confirm=0;
                $post->save();
            
                $empty = $req->file('image');
                if(!empty($empty)){
                    foreach($req->file('image') as $image)
                {
                    $postImage = new Imagepost();
                    $imageName = time() . '.' .$image->getClientOriginalName();
                    $image->move(('storage/post/image/'), $imageName);
                    $thumbnailpath = ('storage/post/image/'.$imageName);
                    $img = Image::make($thumbnailpath)->resize(720, 720, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($thumbnailpath);
                    $postImage->post_id = $post->id;
                    $postImage->image = $imageName;
                    $postImage->save(); 
                }
                }
            
                return redirect('/pendingpost');
            }    
        
        }
    
    
     
        public function postid(Request $request,$id,$data = null){
            if($request->ajax()){
                if($data == 1){
                    $post = Post::find($id);
                    $like = like::where(['user_id'=>session()->get('user')['id'],'post_id'=>$id])->get();
                    return view('front.post.like-unlike',['post'=>$post,'like'=>$like]);
                }else{
                    $post = Post::find($id);
                    return view('front.post.comments',['post'=>$post]);
                }
            }
            $post = Post::find($id);
            $like = like::where(['user_id'=>session()->get('user')['id'],'post_id'=>$id])->get();
            return view('front.post.post',['post'=>$post,'like'=>$like]);
        }
    
        public function save_comment(Request $request){
                $data= new post_comments;
                $data->post_id=$request->post;
                $data->user_id=session()->get('user')['id'];
                $data->slug=sha1(time());
                $data->comment=$request->comment;
                $data->save();
                return response()->json([
                    'bool'=>true
                ]);
        }

        public function unlike($id){
            // dd($id);
            $like = like::find($id)->delete();
            return response()->json([
                'bool'=>true
            ]);
        }

       
        public function likepress(Request $request)
        {
            $data = new like();
            $data->post_id=$request->post_id;
            $data->user_id=session()->get('user')['id'];
            $data->save();
            return response()->json([
                'bool'=>true
            ]);
        }
        public function replys_comment(Request $request){
            $data= new Reply_comments;
            $data->comment_id=$request->post;
            $data->user_id=session()->get('user')['id'];
            $data->comment=$request->comment;
            $data->save();
            return response()->json([
                'bool'=>true
            ]);
        }
        public function reply_comment(Request $request, $id){
            if($request->ajax()){
                $post =  post_comments::find($id);
                return view('front.post.reply-comment',['post'=>$post]);
            }
           $post = post_comments::find($id);
            return view('front.post.comment-reply',['post'=>$post]);
        }
        public function search(Request $req,$data = null){
            if ($req->ajax()) {
                if ($data == 1) {
                    $data = Post::where('name','like','%'.$req->input('name').'%')->get();
                    $search = $req->input('name');
                    return view('front.index-post',['post'=>$data,'search'=>$search]);
                }
            }
           $data = Post::where('name','like','%'.$req->input('name').'%')->get();
           $search = $req->input('name');
           return view('front.post.search',['post'=>$data,'search'=>$search]);
        }

        Public function commentdelete($id){
            $company = post_comments::find($id);
            $company->delete();
            return response()->json([
              'message' => 'Data deleted successfully!'
            ]);
        }
        public function replycommentdelete($id){
            $comment = reply_comments::find($id);
            $comment->delete();
            return response()->json([
                'massage' => 'data deleted successfully'
            ]);
        }
        public function deletepost(Request $req,$id){
            $post = Post::find($id);
           if($post['user_id'] == session()->get('user')['id']){
               
               foreach($post->images as $file){
               $path =   'storage/post/image/'.$file->image;
                if(File::exists($path)){
                    unlink($path);
                }
               }
               $post->delete();
           }           
            return response()->json([
                'massage' => 'data deleted successfully'
            ]);
        }
}
