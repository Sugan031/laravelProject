<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CommController extends Controller
{
    public function index(){
        return view("login");
    }
    public function login(Request $request){
        // $data = $request->all();
        // return $data;
        $user = User::where("email", $request->email)->first();
       if(!Hash::check($request->password,$user->password)){
            return "Username or password is not matched";
       }
       else{
        $request->session()->put("user",$user);
        return redirect("/");
       }
    }
}
