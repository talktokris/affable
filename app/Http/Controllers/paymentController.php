<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Income_list;
use App\Models\Member;



class paymentController extends Controller

{
    //

    public function checkPayment (){
      //  dd("Check Payment Running");


        $incomeListData = Income_list::where('id', '=', 1)->get()->toArray();


        if(count($incomeListData)>=1){
            $incomeTypeWord=$incomeListData[0]['income_name'];
            $incomeTypeInt=$incomeListData[0]['id'];
        } else {
            $incomeTypeWord='';
            $incomeTypeInt=0;
        }

        $pendingData = Package::where('paid_status', '=', 0)->limit(5)->get()->toArray();

        foreach($pendingData as $newData){

            $id=$newData['id'];
            $user_id = $newData['user_id'] ;
            $package_amount= $newData['package_amount'];
            $wallet_address = $newData['wallet_address'] ;
            $transation_hash=$newData['transation_hash'];

            echo "Runing Member Id : ". $user_id."</br>";


            $reffralData = Member::where('id', '=', $id)->get()->toArray(); // finding reffral or sponce id


            
            if(count($reffralData)>=1){   $toUserId=$reffralData[0]['reff_id']; } else {$toUserId=0;}

            $saveIncome = app('App\Http\Controllers\incomeSaveController')
            ->incomeSave($user_id, $toUserId, $user_id, $incomeTypeInt,
             $incomeTypeWord, 1, 1, $package_amount);


             if($saveIncome==1){

                echo "Income Save Succesfully </br>";

                $packageUpdate= Package::where('id', $id)->update(['paid_status'=>1,'active_status'=>1]);

                if($packageUpdate){
                    echo "User Activated Successfully</br>";
                }

              //  dd($packageUpdate);
             }



        }
    }


}