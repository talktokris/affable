<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Package_list;
use App\Models\Package;

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

                $data = $request->all();
                $reff_id=$data['reff_id'];
          

                if($checkReffID==0){ redirect($roughtWord."/".$reff_id)->with('checkReffID', $checkReffID)->with('reff_id', $reff_id);}
                else {


                // Upline ID Find Login Start
                
                $uplineIDCount = Member::where('reff_id','=', $reff_id)->get()->count();
                if($uplineIDCount==0){ 
                    $setUplineIDFinal = $reff_id; 
                    $setCarryGenSideFinal = $this->getSameSide($setUplineIDFinal) ;
                    $NewData = $this->findLastDoneLineLoop($reff_id, $setCarryGenSideFinal);
                    $setUplineIDFinal = $NewData['user_id']; 

                    
                }elseif($uplineIDCount==1){ 
                    $setUplineIDFinal = $reff_id; 
                    $setCarryGenSideFinal = $this->getOpsiteSide($setUplineIDFinal) ;
                    $NewData = $this->findLastDoneLineLoop($reff_id, $setCarryGenSideFinal);
                    $setUplineIDFinal = $NewData['user_id']; 


                }elseif($uplineIDCount==2){ 
                    $setUplineIDFinal = $reff_id;
                    $getUserGinSide = $this->getOpsiteSide($setUplineIDFinal) ; 
                   // $getUserGinSide = $this->getSameSide($reff_id) ;
                    $NewData = $this->findLastDoneLineLoop($reff_id, $getUserGinSide);
                    $setUplineIDFinal = $NewData['user_id']; 
                    $setCarryGenSideFinal=$getUserGinSide;  

                }elseif($uplineIDCount==3){ 
                    $setUplineIDFinal = $reff_id; 
                    $getUserGinSide = $this->getSameSide($reff_id) ;
                   // $setCarryGenSideFinal=$this->setOpSideLogic($getUserGinSide);   
                    $NewData = $this->findLastDoneLineLoop($reff_id, $getUserGinSide);
                    $setUplineIDFinal = $NewData['user_id']; 
                    $setCarryGenSideFinal=$getUserGinSide; 
                               
                }elseif($uplineIDCount==4){ 
                    $setUplineIDFinal = $reff_id; 
                    $getUserGinSide = $this->getSameSide($reff_id) ;
                    $setCarryGenSideFinal=$this->setOpSideLogic($getUserGinSide);   
                    $NewData = $this->findLastDoneLineLoop($reff_id, $setCarryGenSideFinal);
                    $setUplineIDFinal = $NewData['user_id'];  
                    
                }elseif($uplineIDCount==5){ 
                    $setUplineIDFinal = $reff_id; 
                    $getUserGinSide = $this->getSameSide($reff_id) ;
                    $setCarryGenSideFinal=$this->setOpSideLogic($getUserGinSide); 
                    $NewData = $this->findLastDoneLineLoop($reff_id, $setCarryGenSideFinal);
                    $setUplineIDFinal = $NewData['user_id']; 

                }elseif($uplineIDCount>=6){

                    $setUplineIDFinal = $reff_id; 
                    $newCuppllingUpline= $this->findCupplingIDLoop($reff_id);
                    $dataUplineBellowCount = Member::where('upline', $newCuppllingUpline)->get()->count();
                    if($dataUplineBellowCount<1){
                        $logicDesideSide = $this->getSameSide($newCuppllingUpline) ;
                    }elseif($dataUplineBellowCount>=1) {
                        $logicDesideSide=$this->getOpsiteSide($newCuppllingUpline);   

                    } else {
                        $logicDesideSide = $this->getSameSide($newCuppllingUpline) ;
                    }
                  //  $getUserGinSide = $this->getSameSide($newCuppllingUpline) ;
                   
                    $setUplineIDFinal=$newCuppllingUpline;
                    $setCarryGenSideFinal= $logicDesideSide;

                  //  dd("uplineIDCount : ".$dataUplineBellowCount.'---'.$setUplineIDFinal. ' - -'.$setCarryGenSideFinal);
                    
                }

                // Upline ID Find Login Start


                $uplineSave=$setUplineIDFinal;
                $carry_gen=$setCarryGenSideFinal;
             
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

                $pacData= Package_list::where([['id',1],['status',1]])->get()->toArray();

                if(count($pacData)>=1){  $packageSelected= $pacData[0]['package_amount']; }
                else {$packageSelected=20;}
                $transation_hash='';
                $pacSave = new Package;
                $pacSave->mem_id= $imageSave->id;
                $pacSave->user_id = $imageSave->user_id;
                $pacSave->wallet_address = $imageSave->wallet_address;
                $pacSave->package_amount = $packageSelected;
                $pacSave->transation_hash=$transation_hash;
                $pacSave->paid_status=0;
                $pacSave->active_status=0;
                $pacSave->save();


                

                    if($pacSave){

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


    public function findLastDoneLineLoop($reff_id, $getUserGinSide){

        $x=0;

        do{
            $lastData = $this->findLastDownLine($reff_id, $getUserGinSide); 
            $reff_id=$lastData['user_id'];
            
            if($lastData['status']==0){     $x=2;  }

        }while($x<=1);
        
        return $lastData;

    }


    public function findCupplingIDLoop($reff_id){

        $dataLevelOne = Member::where('upline', $reff_id)->orderBy('carry_gen', 'ASC')->get()->toArray();

        $x=0;

        do{
            $lastData = $this->findCupplingID($dataLevelOne); 

            if($lastData['status']==1) { 
                return $lastData['upline'];
                $x=2;

             }elseif($lastData['status']==0){

                $dataLevelOne = $lastData['data'];

               // dd($dataLevelOne);
                
             }


          //  dd($lastData);
          //  $reff_id=$lastData['user_id'];
            
           // if($lastData['status']==1){     $x=2;  }

       

        }while($x<=1);
        
        return $lastData;

    }


    //find cuppllingUplineID

    public function findCupplingID($dataLevelOne){

     $dataArray=[];

    // dd($dataLevelOne);

        foreach($dataLevelOne as $item){

       


            $newUid= $item['user_id'];

            $countDownLine= Member::where('upline', $newUid)->get()->count();

            if($countDownLine<=1){
             
                return $out=['status'=>1,'upline'=>$newUid];
                break; 
            }
            if($countDownLine>=2){
                $dataLevelTwo= Member::where('upline', $newUid)->orderBy('carry_gen','ASC')->get()->toArray();
                foreach($dataLevelTwo as $newItem){

                    $newGetID= $newItem['user_id'];
                   // $dataArray['user_id'] = $newGetID;
                    array_push($dataArray, ['user_id'=>$newGetID]);
                }


            }
         //   echo $countDownLine."</br></br>";

          //  echo $item['user_id'] ."</br>";
        }

        return $out=['status'=>0,'data'=>$dataArray];

       // dd($dataArray);
    }

    // find leftside downline

    public function findLastDownLine($reff_id, $getUserGinSide){

        $dataCount = Member::where([['upline','=',$reff_id],['carry_gen','=',$getUserGinSide]])->get()->count();
        if($dataCount>=1){
            $dataGet = Member::where([['upline','=',$reff_id],['carry_gen','=',$getUserGinSide]])->get()->toArray();
            $idOfUser=$dataGet[0]['user_id'];


            $dataCountSecond = Member::where([['upline','=',$idOfUser],['carry_gen','=',$getUserGinSide]])->get()->count();
           // dd($idOfUser.'-'.$getUserGinSide.'-'.$dataCountSecond);

            return $out=['status'=>$dataCountSecond, 'user_id'=>$idOfUser];
        }else { return $out=['status'=>$dataCount, 'user_id'=>$reff_id] ;}
        
    }

    // Find carry gen oposite side
    public function setOpSideLogic($getCarryGenSide){

        if($getCarryGenSide=="L"){ $setCarryGenSideFinal="R";} 
        elseif($getCarryGenSide=="R"){ $setCarryGenSideFinal="L";} 
        return $setCarryGenSideFinal;
        
    }

// Find carry gen oposite side
    public function getOpsiteSide($setUplineIDFinal){
        $getSideData = Member::where('user_id','=', $setUplineIDFinal)->get()->toArray();
        if(count($getSideData)>=1){
                if(count($getSideData))
                $getCarryGenSide = $getSideData[0]['carry_gen'];
                if($getCarryGenSide=="L"){ $setCarryGenSideFinal="R";} 
                elseif($getCarryGenSide=="R"){ $setCarryGenSideFinal="L";} 

                return $setCarryGenSideFinal;
        } else { return '';}
    }

// Find carry gen side
    public function getSameSide($setUplineIDFinal){
        $getSideData = Member::where('user_id','=', $setUplineIDFinal)->get()->toArray();
        if(count($getSideData)>=1){
            $setCarryGenSideFinal = $getSideData[0]['carry_gen'];
            return $setCarryGenSideFinal;
        } else { return '';}
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