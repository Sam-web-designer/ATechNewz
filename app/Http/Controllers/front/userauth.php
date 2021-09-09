<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class userauth extends Controller
{
   function index(){
       return view('front.register');
   }
   function login(Request $req){
    $this->validate($req, [
        'email'           => 'required|max:255|email',
        'pass'           => 'required',
    ]);
        $user = User::where(['email'=>$req->email , 'is_verified' => 1,])->first();
        if($user){
            if($user->pass == Hash::check($req->pass, $user->pass) && $user->is_verified == 1  ){
                        $req->session()->put('user',$user);
                        return redirect('/');
               
            }else{
                return redirect()->back()->with('msg','Please Enter Valid Password.');
            }
        }else{
            return redirect()->back()->with('msg','Email address that you entered does not match with an account. Please create Account');
        }
   }


   function registerview(){
       if(session()->get('user')['id']){
           return redirect('/');
       }else{
           return view('front.login.register');
       }
   }

   function register(Request $req){
    $register = User::where(['email'=>$req->email,'is_verified' => 0])->first();
        if($register){
            $valid = $register;
           if($valid->name == $req->name){
                $valid->name=$req->name;
           }else{
            $this->validate($req, [
                'name'    => 'required|unique:users,name',
            ]);
                $register->name=$req->name;
           }
            
            $register->email=$req->email;
            $register->pass=Hash::make($req->pass);
            $register->email_token = sha1(time());
            $register->is_verified = 0;
            $register->trams_policy = $req->trams_policy;
            $register->save();
                if($register){
                MailController::sendSingupEmail($register->name, $register->email,$register->email_token);
                $req->session()->flash('msg','We have sent an email with a confirmation link to your email address Check Spam Folder if not Received');
                return redirect()->back();
                }
        }else{
            $this->validate($req, [
                'email'           => 'required|max:255|email|unique:users,email',
                'pass'           => 'required',
                'name'    => 'required|unique:users,name',
            ]);
            $user = New User();
            $user->name=$req->name;
            $user->email=$req->email;
            $user->pass=Hash::make($req->pass);
            $user->email_token = sha1(time());
            $user->is_verified = 0;
            $user->trams_policy = $req->trams_policy;
            $user->save();
                if($user != null){
                MailController::sendSingupEmail($user->name, $user->email,$user->email_token);
                $req->session()->flash('msg','We have sent an email with a confirmation link to your email address Check Spam Folder if not Received');
                return redirect()->back();
                }
        }
   }




  function userverify(Request $request,$email_token){
      $user  = User::where(['email_token'=> $email_token])->first();
      if($user != null){
          $user->is_verified = 1;
          $user->email_token = sha1(time());
          $user->save();
          $request->session()->put('user',$user);
          return redirect('/myprofile');
      }
      return redirect('/myprofile');
  }
  function forget(){
      if(session()->get('user')['id']){
        return redirect('/');
      }else{
        return view('front.login.forget-password');
      }
  }

  function forget_password_mail(Request $request){
      $user = User::where(['email' => $request->input('email')])->first();
      $str_result = '0123456789';
        if($user != null){
            $user->email_token =substr(str_shuffle($str_result),0,6);
            $user->save();
            MailController::forgetmail($user->name, $user->email,$user->pass, $user->email_token);
             $request->session()->flash('chack_mail','Plese chack your mail');
             return view('front.login.forget-otp');
        }
      return redirect()->back()->with('msg','Please register your Account');

  }

  function forgetpassword(Request $request){
    $user = User::where(['email_token' => $request->input('email_token')])->first();
    if($user != $request->input('email_token')){
    if($user != null){
        return view('front.login.forget-in',compact("user"));
    }else{
       return view('front.login.password-worng');
    }
    }else{
        return redirect('/register');
    }
  }
  function newpassword(Request $request,$email_token){
    $str_result = '0123456789';
    $user = User::where(['email_token' => $email_token])->first();
     if($user->email_token == $email_token ){
         $user->pass = Hash::make($request->pass);
         $user->email_token = substr(str_shuffle($str_result),0,6);
         $user->save();
         $request->session()->put('user',$user);
         return redirect('/');
     }
  }
//   public function user(Request $request){
//     $user = User::where(['email_token' => $request->token])
//   }



}
