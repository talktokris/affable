<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    public function index(){




        $readSession = app('App\Http\Controllers\authCheckController')->readSession();
        if($readSession=="0") { return redirect('/'); } 
        else{
        $sessionInfo = app('App\Http\Controllers\authCheckController')->tokenValidate($readSession);
        $userInfo = app('App\Http\Controllers\commanController')->headerInfo($sessionInfo['userID'],$sessionInfo['type']);


        return view("public.home")->with(compact("userInfo"));
        
        }
    }
}