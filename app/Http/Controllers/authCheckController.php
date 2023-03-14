<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class authCheckController extends Controller
{
 
    public function tokenCreate($user_id, $type){

        if($type==1){
            $secrectToken = env("SEC_TOKEN", "f150afab8c3b16");  
        }elseif($type==2){
            $secrectToken = env("VIEW_TOKEN", "54fa78506053b"); 
        }else {
            $secrectToken='aff94862d39248e9948b7f0095c3737cf57b8c05';
        }

        $md5_newtoken = md5($secrectToken.$user_id);
        $token= base64_encode($md5_newtoken.'|||'.$user_id);

        return $token;

    }

    public function tokenValidate($token){;

        

        if($token=="0"){ redirect("/"); } 
        else {
            
            $tokenDecode= base64_decode($token);
            $tokenPart= explode("|||", $tokenDecode);

            $secrectToken = env("SEC_TOKEN", "f150afab8c3b16"); 
            $md5_newtoken = md5($secrectToken.$tokenPart[1]);
            $tokenNew= base64_encode($md5_newtoken.'|||'.$tokenPart[1]);

            $viewToken = env("VIEW_TOKEN", "54fa78506053b"); 
            $md5_newtokenView = md5($viewToken.$tokenPart[1]);
            $tokenNewView= base64_encode($md5_newtokenView.'|||'.$tokenPart[1]);

        
            if($tokenNew==$token){
                $logData= ['userID'=> $tokenPart[1], 'type'=>1];
                return $logData;
            }
            elseif($tokenNewView==$token){
                $logData= ['userID'=> $tokenPart[1], 'type'=>2];
                return $logData;
            } else {     $logData= ['userID'=> 0, 'type'=>0];
                return $logData;  }

        }

    }


    public function createSession($token){

        $sessionSet= Session::put('auth_token', $token);

         
        if($sessionSet){
            return 1;
        }else {
            return 0;
        }

     }

     public function readSession(){

        $sessionGet =  Session::get('auth_token');
        if($sessionGet){
            return $sessionGet;
        }else {
            return 0;
        }
 
     }
     public function logoutSession( Request $request){

        $request->session()->flush();
        return redirect('/');
        
     }

    

     

}