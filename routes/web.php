<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PendingController;
use App\Http\Controllers\front\userauth;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PostController;
use App\Http\Controllers\front\ProfileController;
use App\Http\Controllers\front\UserprofileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/register',[userauth::class,'registerview']);
Route::post('/reg',[userauth::class,'register']);

route::get('/verify/{email_token}',[userauth::class,'userverify'])->name('verify.user');

Route::get('forget-password',[userauth::class,'forget']);
Route::post('/forget_password',[userauth::class,'forget_password_mail']);

Route::post('forget-password',[userauth::class,'forgetpassword']);
Route::post("new-password/{email_token}",[userauth::class,'newpassword'])->name('password-reset');

Route::view('Terms','front.about-us.terms')->name('terms');
Route::view('privacypolicy','front.about-us.privacypolicy')->name('privacypolicy');



Route::get('/loginin', function () {
    return view('front.loginin');
});
Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/mobile',[HomeController::class,'mobile'])->name('mobile');
Route::get('/computer',[HomeController::class,'computer'])->name('computer');
Route::get('/tv',[HomeController::class,'tv'])->name('tv');
Route::get('/games',[HomeController::class,'games'])->name('games');
Route::get('/Accessories',[HomeController::class,'Accessories'])->name('accessories');
Route::get('/Suggestion',[HomeController::class,'suggestion'])->name('suggestion');

Route::get('/post/{id}/{data?}',[PostController::class,'postid'])->name('postname');
Route::get('/comment/reply-comment/{id}',[PostController::class,'reply_comment'])->name('replycomment.id');

Route::get('/user/{name}/{data?}',[UserprofileController::class,'userprofile'])->name('user');

Route::view('/about-Us','front.about-us.about-us')->name('about');
Route::post('/search-list/{data?}',[PostController::class,'search'])->name('search');



Route::middleware([auth::class])->group(function(){
   
                Route::view('/login','front.login.login')->name('login');
                Route::get('/logout', function () {
                    session()->forget('user');
                    return redirect('/');
                  });
                Route::get('deletepost/{id}',[PostController::class,'deletepost'])->name('delete.post');
                //  Route::get('/register',[userauth::class,'index']);
                Route::post('/login',[userauth::class,'login']);
                Route::view('/user-new-password','front.myprofile.edit-password')->name('userforget');
                Route::post('/user-new-pass',[ProfileController::class,'user_pass_update']);

                Route::get('/myfriendlist', function () {
                    return view('front.myprofile.friend');
                  })->name('myfriendlist');

                Route::get('/myprofile',[HomeController::class,'myprofile'])->name('myprofile');

                Route::get('/followinglist',[ProfileController::class,'followinglist'])->name('myfollowing');
                  Route::get('followdelete/{id}',[ProfileController::class,'followdelete'])->name('followdelete');
                Route::post('/following-friend',[ProfileController::class,'following_post'])->name('follow');
                Route::get('follow',[ProfileController::class,'follow'])->name('your-follow');

                route::get('/pendingpost',[HomeController::class,'pendingpost'])->name('pendingpost');

                  Route::get('/postview', function () {
                    return view('front.post.postupload');
                  });

                  Route::post('/post-upload',[PostController::class,'post_upload']);
                  Route::Post('save-comment',[PostController::class,'save_comment'])->name('save-comment');
                  Route::post('/reply-comment',[PostController::class,'replys_comment'])->name('replys-comment');
                 
                  Route::post('profile-image-change',[ProfileController::class,'profile_image_change'])->name('avatar-change');

                  Route::get('comment/{id}',[PostController::class,'commentdelete'])->name('comment.delete');
               
                  Route::get('reply-comment/{id}',[PostController::class,'replycommentdelete'])->name('replycomment.delete');
                  Route::get('follower',[ProfileController::class,'following'])->name('folow');
                  
                  Route::post('/like-user',[PostController::class,'likepress'])->name('presslike');
                  Route::get('ppost/unlike/{id}',[PostController::class,'unlike'])->name('unlike');
});


Route::post('/adminlogin',[AdminController::class,'adminlogin']);
Route::middleware(['admin'])->group(function(){
      Route::get('/AdminTech',[AdminController::class,'adminloginview']);
     
      Route::get('/adminlogout', function () {
        session()->forget('admin');
        return redirect('/AdminTech');
      });
      Route::get('AdminHome',[PendingController::class,'adminhome'])->name('adminhome');
      Route::get('/pendingpostopen/{id}',[PendingController::class,'pendingpostopen'])->name('adminpending');
      Route::get('/approvepost/{id}/',[PendingController::class,'approvepost']);
      Route::get('deletepostadmin/{id}',[PendingController::class,'deletepostadmin']);
      Route::get('adminuserlist',[UserController::class,'userlist'])->name('adminuserlist');
      Route::get('approveuseradmin/{id}',[UserController::class,'approveuseradmin'])->name('approveuseradmin');
      Route::get('removeadmin/{id}',[UserController::class,'removeadmin'])->name('removeadmin');
});








