<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class smsController extends Controller
{
    public function index(){
        return view('website.signin.index');
    }

    public function registration(){
        return view('website.signup.index');
    }
}
