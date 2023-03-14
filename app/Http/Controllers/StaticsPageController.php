<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticsPageController extends Controller
{
    public function index(){

        $readSession = app('App\Http\Controllers\authCheckController')->readSession();
        $sessionInfo = app('App\Http\Controllers\authCheckController')->tokenValidate($readSession);
      //  dd($sessionInfo);
        if(($readSession=="0")||($sessionInfo["type"]=="0")) { return redirect('/'); } 
        else{
        $userInfo = app('App\Http\Controllers\commanController')->headerInfo($sessionInfo['userID'],$sessionInfo['type']);
 

        return view("public.statics")->with(compact("userInfo"));
        }
    }
}