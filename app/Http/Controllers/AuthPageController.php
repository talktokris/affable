<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class AuthPageController extends Controller
{
    //
    public function index(){

        return view("public.login");
    }
    public function viewing(Request $request){


        if ('POST' === $request->getMethod()){

            $maxIDNumber=100000; $minIDNumber=999999;

            $validatedData= $request->validate([
                'user_id'=> 'required|integer|between:100000,999999',

            ]);

            $data = $request->all();

            $memberCount = Member::where('user_id', $data['user_id'])->get()->count();

            if($memberCount>=1){

                $tokenHash = app('App\Http\Controllers\authCheckController')->tokenCreate($data['user_id'], 2);

                $sessionStore = app('App\Http\Controllers\authCheckController')->createSession($tokenHash);
            //   dd($sessionStore);
                return redirect('/home'); 
            } else {
                return redirect('/')->with('user_id', $data['user_id'])->with('flash_message_errors', 'Invalid User ID'); 
            }
        }
    }


    public function register(Request $request, $reff_id=null ){

        $maxIDNumber=100000; $minIDNumber=999999; $roughtWord='en';

      //  $sessionStore = app('App\Http\Controllers\authCheckController')->createSession($tokenHash);
      //  $sessionStore = app('App\Http\Controllers\authCheckController')->readSession();

        if($reff_id!=null){  $checkReffID= Member::where('user_id','=', $reff_id)->get()->count();  }
        else {$checkReffID==0; $reff_id=''; }

            if ('POST' === $request->getMethod()){

                $validatedData= $request->validate([
                    'reff_id'=> 'required|integer|between:100000,999999',

                ]);

                if($checkReffID==0){ redirect($roughtWord."/".$reff_id)->with('checkReffID', $checkReffID)->with('reff_id', $reff_id);}
                else {

                $data = $request->all();

                $reff_id=$data['reff_id'];
                $carry_gen='L';
                $uplineSave=100008;
                $wallet_address=$data['wallet_address'];
                $saveStatus=1;
                $GenUserID = $this->checkPreID($maxIDNumber,$minIDNumber);

                $imageSave = new Member;
                $imageSave->user_id = $GenUserID;
                $imageSave->upline = $uplineSave;
                $imageSave->reff_id = $reff_id;
                $imageSave->wallet_address=$wallet_address;
                $imageSave->carry_gen=$carry_gen;
                $imageSave->status = $saveStatus;
                $imageSave->save();

                    if($imageSave){

                        $tokenHash = app('App\Http\Controllers\authCheckController')->tokenCreate($GenUserID, 1);
                      

                        $sessionStore = app('App\Http\Controllers\authCheckController')->createSession($tokenHash);
                     //   dd($sessionStore);
                      return redirect('/home'); 
                    }
                    
                      //  return redirect($roughtWord."/".$reff_id)->with('checkReffID', $checkReffID)->with('reff_id', $reff_id)->with('flash_message_success', ' User registered successfully');  }
                    else {   return  redirect($roughtWord."/".$reff_id)->with('checkReffID', $checkReffID)->with('reff_id', $reff_id)->with('flash_message_error', 'Oops ! Something went wrong, Please contact admin.');  }

                }

            }

        return view("public.login")->with('checkReffID', $checkReffID)->with('reff_id', $reff_id);
    }


// Check if User id exist
    public function checkPreID($min, $max){
        $x=1;
        
        while($x<=2){

            $newID =   $newID= mt_rand($min, $max);
           // echo $newID."</br>";
            $checkPreID= Member::where('user_id','=', $newID)->get()->count();
            if($checkPreID==0){    $x=3;   }

        }

        return $newID; 
   
    }


    public function tokenEncode($user_id){

        $secrectToken = env("SEC_TOKEN", "f150afab8c3b16"); 


        $md5_newtoken = md5($secrectToken.$user_id);
        $token= base64_encode($md5_newtoken.'|||'.$user_id);

        return $token;

    }

    public function tokenValidate($token){
        
        $tokenDecode= base64_decode($token);
        $tokenPart= explode("|||", $tokenDecode);

        $secrectToken = env("SEC_TOKEN", "f150afab8c3b16"); 
        $md5_newtoken = md5($secrectToken.$tokenPart[1]);
        $tokenNew= base64_encode($md5_newtoken.'|||'.$tokenPart[1]);

        if($tokenNew==$token){
            return $tokenPart[1];
        } else {   return 0;  }

    }

}