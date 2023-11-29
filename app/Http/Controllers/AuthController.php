<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt([
            "email"=>$request->email,
            "password"=>$request->password
        ])){
            $user = Auth::user();
            $token = $user->createToken($user->email)->plainTextToken;
            return response([
                "message"=>"log in success!",
                "token"=>$token
            ]);
        }else{
            return response(["message"=>"Invalid username or password"],401);
        }
    }
}