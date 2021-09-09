<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function adminloginview(){
        if(session()->get('admin')){
            return redirect('/AdminHome');
        }else{
            return view('backend.login.login');
           
        }
    }
    public function adminlogin(Request $req){
            $this->validate($req, [
                'email'           => 'required|max:255|email',
                'password'           => 'required',
            ]);
               $user = Admin::where(['email'=>$req->email ,'password'=> $req->password])->first();
               if(!$user || Hash::check($req->password, $user->password,)){
                   return redirect()->back()->with('msg','Please Valid Email address and Password. create Your account');
               }else{
                    $req->session()->put('admin',$user);
                    return redirect('AdminHome');
               }
    }
 
}
