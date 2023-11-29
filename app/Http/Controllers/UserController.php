<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function users(){
        $users = User::all();
        return response($users);
    }

    public function user($id){
        $user = User::find($id);
        return response($user);
    }

    public function delete($id){
        $user = User::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}
