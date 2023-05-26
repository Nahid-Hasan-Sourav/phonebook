<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserAuthController extends Controller


{

    private $user;

    public function createUser(Request $request){
        user::createNewUser($request);
        return redirect('/')->with('message','Registration Completed Successfully');
    }

    public function login(Request $request){
            $this->user = User::where('email',$request->email)->first();
            if($this->user){
                if (password_verify($request->password,$this->user->password)){
                    Session::put('user_id',$this->user->id);
                    Session::put('user_name',$this->user->name);
                    Session::put('user_email',$this->user->email);
                    Session::put('user_image',$this->user->image);
                    return redirect('/dashboard');
                }
                else{
                    return back()->with('message','sorry...password is wrong');

                }
            }
            else{
                return  back()->with('message','sorry...email is wrong');
            }
    }

    public function logout(){
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('user_email');
        Session::forget('user_image');
        return redirect('/');
    }
}
