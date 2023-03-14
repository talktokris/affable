<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Withdrawal_list;
use App\Models\Income_list;

class WithdrawalPageController extends Controller
{
    public function index(request $request){

        $readSession = app('App\Http\Controllers\authCheckController')->readSession();
        $sessionInfo = app('App\Http\Controllers\authCheckController')->tokenValidate($readSession);
       // dd($sessionInfo);
        if(($readSession=="0")||($sessionInfo["type"]=="0")) { return redirect('/'); } 
        else{
        $userInfo = app('App\Http\Controllers\commanController')->headerInfo($sessionInfo['userID'],$sessionInfo['type']);
 

        if($request->isMethod('POST')){

            $minWithAmount=$userInfo['minWithAmount'];
            $sessionUserID=$sessionInfo['userID'];
            $sessionType= $sessionInfo['type'];
            $walletAddress=$userInfo['wallet'];
            $reDisPercentage=$userInfo['reDisPer'];
            $cashOutPercentage= 100- $reDisPercentage;
            
            
            $validatedData= $request->validate([
                'withdrawal-amount'=>'required|int|min:'.$minWithAmount.'|max:5000',
            ]);
            



            $incomeListData = Income_list::where('id', '=', 2)->get()->toArray();


            $data = $request->all();

            $withdrawalAmount= $data['withdrawal-amount'];


            if(count($incomeListData)>=1){
                $incomeTypeWord=$incomeListData[0]['income_name'];
                $incomeTypeInt=$incomeListData[0]['id'];
            } else {
                $incomeTypeWord='';
                $incomeTypeInt=0;
            }

          //  dd("hi");

            $incomeSave = app('App\Http\Controllers\incomeSaveController')
            ->incomeSave(0, $sessionUserID, $sessionUserID, $incomeTypeInt,
             $incomeTypeWord, 1, 1, $withdrawalAmount, 1, 1);


             if($incomeSave->status==1){

                $incomeTrasationID=$incomeSave->id;


                $withdrawalSave = new Withdrawal_list ;


                $redistribution_amount = $this->percentageCalc($withdrawalAmount, $reDisPercentage);
              
                $cash_out_amount = $this->percentageCalc($withdrawalAmount, $cashOutPercentage);
                $community_dis_amount= $this->percentageCalc($redistribution_amount, 44);
                $sponser_dis_amount= $this->percentageCalc($redistribution_amount, 35);
                $investor_amount = $this->percentageCalc($redistribution_amount, 5);
                $dolphin_amount  = $this->percentageCalc($redistribution_amount, 5);
                $shark_amount  = $this->percentageCalc($redistribution_amount, 4);
                $whale_amount  = $this->percentageCalc($redistribution_amount, 3);
                $humpback_amount  = $this->percentageCalc($redistribution_amount, 2);
                $affable_amount = $this->percentageCalc($redistribution_amount, 2);
             
                

                $withdrawalSave->user_id= $sessionUserID;
                $withdrawalSave->member_income_id = $incomeTrasationID;
                $withdrawalSave->withdrawal_amount = $withdrawalAmount;
                $withdrawalSave->redistribution_amount = $redistribution_amount;
                $withdrawalSave->cash_out_amount= $cash_out_amount;
                $withdrawalSave->wallet_address= $walletAddress;
                $withdrawalSave->transation_hash= '';
                $withdrawalSave->send_status = 0;
                $withdrawalSave->community_dis_amount=$community_dis_amount;
                $withdrawalSave->community_dis_status=0;
                $withdrawalSave->sponser_dis_amount= $sponser_dis_amount;
                $withdrawalSave->sponser_dis_status=0;
                $withdrawalSave->investor_amount = $investor_amount;
                $withdrawalSave->invester_dis_status= 0;
                $withdrawalSave->dolphin_amount= $dolphin_amount;
                $withdrawalSave->dolphin_dis_status= 0;
                $withdrawalSave->shark_amount= $shark_amount;
                $withdrawalSave->shark_dis_status= 0;
                $withdrawalSave->whale_amount= $whale_amount;
                $withdrawalSave->whale_dis_status= 0;
                $withdrawalSave->humpback_amount= $humpback_amount;
                $withdrawalSave->humpback_dis_status= 0;
                $withdrawalSave->affable_amount= $affable_amount;
                $withdrawalSave->affable_dis_status= 0;
                $withdrawalSave->save();



               if($withdrawalSave){

                redirect("/withdrawal")->with('flash_message_success', 'Your withdrawal is successfully submited.');
                


               }else {
                redirect("/withdrawal")->with('flash_message_error', 'Withdrawal Error, Plz contact support');


               }


               





             }


           //  dd($incomeSave->status);
           
 

             /*

            echo "<pre>";
            print_r($_REQUEST[]);
            echo "</pre>";
*/
          //  dd("this is post method");
        }


        return view("public.withdrawal")->with(compact("userInfo"));
        }
    }




    public function withdrawalAjex(Request $request){

 //echo "Hi";

        $readSession = app('App\Http\Controllers\authCheckController')->readSession();
        $sessionInfo = app('App\Http\Controllers\authCheckController')->tokenValidate($readSession);
        // dd($sessionInfo);
        if(($readSession=="0")||($sessionInfo["type"]=="0")) { return redirect('/'); } 
        else{
        $userInfo = app('App\Http\Controllers\commanController')->headerInfo($sessionInfo['userID'],$sessionInfo['type']);

                
        $data = $request->all();

        $withdrawalAmount= $data['withdrawal-amount'];

        // echo $withdrawalAmount;
        $accountBalance = $userInfo['matic'];
        $minWithAmount=$userInfo['minWithAmount'];

      
        $sessionUserID=$sessionInfo['userID'];
        $sessionType= $sessionInfo['type'];
        $walletAddress=$userInfo['wallet'];
        $reDisPercentage=$userInfo['reDisPer'];
        $cashOutPercentage= 100 - $reDisPercentage;
        
        
   

            $validator = Validator::make($data, [
                'withdrawal-amount'=>'required|int|min:'.$minWithAmount.'|max:5000',

                ]);

                /*
                    if ($validator->fails()) {
                        return response()->json(['error' => $validator->messages()], 200);
                    }
                */
                
                if($validator->fails()) {
                    
                            return response()->json([
                                'status' => 'error',
                                'message' => 'Invalid withdrawal amount',
                            ]);

                }

                if($accountBalance < $withdrawalAmount){

                    return response()->json([
                        'status' => 'error',
                        'message' => 'Insufficient account balance ',
                    ]);
                }




        $incomeListData = Income_list::where('id', '=', 2)->get()->toArray();


       


        if(count($incomeListData)>=1){
            $incomeTypeWord=$incomeListData[0]['income_name'];
            $incomeTypeInt=$incomeListData[0]['id'];
        } else {
            $incomeTypeWord='';
            $incomeTypeInt=0;
        }

      //  dd("hi");

      

        $incomeSave = app('App\Http\Controllers\incomeSaveController')
        ->incomeSave(0, $sessionUserID, $sessionUserID, $incomeTypeInt,
         $incomeTypeWord, 1, 1, $withdrawalAmount, 1, 1);


         if($incomeSave->status==1){

            $incomeTrasationID=$incomeSave->id;


            $withdrawalSave = new Withdrawal_list ;


            $redistribution_amount = $this->percentageCalc($withdrawalAmount, $reDisPercentage);
          
            $cash_out_amount = $this->percentageCalc($withdrawalAmount, $cashOutPercentage);
            $community_dis_amount= $this->percentageCalc($redistribution_amount, 44);
            $sponser_dis_amount= $this->percentageCalc($redistribution_amount, 35);
            $investor_amount = $this->percentageCalc($redistribution_amount, 5);
            $dolphin_amount  = $this->percentageCalc($redistribution_amount, 5);
            $shark_amount  = $this->percentageCalc($redistribution_amount, 4);
            $whale_amount  = $this->percentageCalc($redistribution_amount, 3);
            $humpback_amount  = $this->percentageCalc($redistribution_amount, 2);
            $affable_amount = $this->percentageCalc($redistribution_amount, 2);
         
            

            $withdrawalSave->user_id= $sessionUserID;
            $withdrawalSave->member_income_id = $incomeTrasationID;
            $withdrawalSave->withdrawal_amount = $withdrawalAmount;
            $withdrawalSave->redistribution_amount = $redistribution_amount;
            $withdrawalSave->cash_out_amount= $cash_out_amount;
            $withdrawalSave->wallet_address= $walletAddress;
            $withdrawalSave->transation_hash= '';
            $withdrawalSave->send_status = 0;
            $withdrawalSave->community_dis_amount=$community_dis_amount;
            $withdrawalSave->community_dis_status=0;
            $withdrawalSave->sponser_dis_amount= $sponser_dis_amount;
            $withdrawalSave->sponser_dis_status=0;
            $withdrawalSave->investor_amount = $investor_amount;
            $withdrawalSave->invester_dis_status= 0;
            $withdrawalSave->dolphin_amount= $dolphin_amount;
            $withdrawalSave->dolphin_dis_status= 0;
            $withdrawalSave->shark_amount= $shark_amount;
            $withdrawalSave->shark_dis_status= 0;
            $withdrawalSave->whale_amount= $whale_amount;
            $withdrawalSave->whale_dis_status= 0;
            $withdrawalSave->humpback_amount= $humpback_amount;
            $withdrawalSave->humpback_dis_status= 0;
            $withdrawalSave->affable_amount= $affable_amount;
            $withdrawalSave->affable_dis_status= 0;
            $withdrawalSave->save();

     
           if($withdrawalSave){


            return response()->json([
                'status' => 'success',
                'message' => 'Your withdrawal has submited successfully',
            ]);

           }else {

            return response()->json([
                'status' => 'error',
                'message' => 'Withdrawal Error, Plz contact support',
            ]);


           }
           

        }

        }

    }


    public function percentageCalc($amount, $per){

        $calc= $amount/100 *$per;

        return round($calc, 2);
        
    }
}