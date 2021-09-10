<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{

    public function createUser(Request $request){
       $request->validate([
           'name'=>'required|string|max:255,',
           'email'=>'required|email|max:50|unique',
           'password'=>'required|string|min:8'
       ]);
       User::create(
            [
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>$request['password']
            ]
       );
       return response("User created",201);
    }
    public function login(Request $request){
        $user = Admin::where('email',$request['email'])->get()->first();
        if(!$user || !Hash::check($request['password'],$user->password)){
          return response('Wrong cridentials',403);
        }else{
            return response("logged in..Welcome",200);
        }
    }
  

    public function logout(Request $request){
        
    }
    
}
