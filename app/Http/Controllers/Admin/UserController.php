<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userlist(){
        $user = User::where(['is_verified' =>1])->get();
        return view('backend.user.userlist',['user'=>$user]);
    }
    public function approveuseradmin($id,Request $req){
        $data=array(
            'role_id'=> 'yes',
          );
          DB::table('users')->where('id',$id)->update($data);
        return redirect()->back();
    }
    public function removeadmin($id,Request $req){
        $data=array(
            'role_id'=> 'no',
          );
        DB::table('users')->where('id',$id)->update($data);
        return redirect()->back();
    }
}
