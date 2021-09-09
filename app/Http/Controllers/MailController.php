<?php

namespace App\Http\Controllers;

use App\Mail\forgetEmail;
use App\Mail\VerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSingupEmail($name, $email, $email_token ){
        $data = [
            'name' => $name,
            "email_token" =>$email_token
        ];
        Mail::to($email)->send(new VerificationEmail($data));
    }
    public static function forgetmail($name, $email, $password , $email_token){
        $data = [
            'name' =>$name,
            'email' => $email,
            'pass' => $password,
            'email_token' => $email_token
        ];
        Mail::to($email)->send(new forgetEmail($data));
    }
}
