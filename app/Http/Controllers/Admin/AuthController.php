<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if(auth("admin")->attempt($data)){
            return redirect(route("admin.posts.index"));
        }


        return redirect(route("admin.login"))->withErrors(["email" =>"User doesn`t exist"]);
    }


    public function logout(){
        auth("admin")->logout();

        return redirect(route("home"));
    }
}
