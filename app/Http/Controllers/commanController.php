<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Member_income;
use App\Models\Package;

class commanController extends Controller

{
    //



    public function headerInfo($user_id, $type){

        $reffLinkDomain = "http://localhost/avinash/affable/affable_vue/public/en";
        $totalUser = 1500 + $this->totalUsers();
        $totalMatic = 100000 + $this->totalUsdt();

       // dd($user_id);

        $memberData = Member::where('user_id', $user_id)->get()->toArray();
       // dd(count($memberData));

        if(count($memberData)>=1){ 
            $userMemberID=$memberData[0]['user_id'];
            $userWalletAddress=$memberData[0]['wallet_address'];
           
            $userUplineID=$memberData[0]['upline'];
        }
        else { 
            $userMemberID='';
            $userWalletAddress='';
            $userUplineID='';
        }
      //  dd($memberDataUserId);
        $minWithAmount=25;
        $reDisPer=50;

        $dataSet=[
            'totalUser'=>$totalUser,
            'totalMatic'=>$totalMatic,
            'reffLink'=>$reffLinkDomain.'/'.$userMemberID,
            'wallet'=>$userWalletAddress,
            'userID'=>$userMemberID,
            'logType'=>$type,
            'uplineID'=>$userUplineID,
            'matic'=>$this->accountBalance($user_id, $type),
            'reDisPer'=>$reDisPer,
            'minWithAmount'=>$minWithAmount,
        ];

            return $dataSet;
            
         //   dd($dataSet);
    }

    public function accountBalance ($user_id, $type){

        $totalCreditBalance= Member_income::where([['to_user_id','=',$user_id],['debit_credit_status','=',2],['pending_status','=',1]])->sum('income_amount');
        $totalDebitBalance= Member_income::where([['to_user_id','=',$user_id],['debit_credit_status','=',1],['pending_status','=',1]])->sum('income_amount');

        $getAccountBalance= $totalCreditBalance - $totalDebitBalance;

        return $getAccountBalance;

    }



    public function totalUsers (){

        $totalUser= Member::where('status','=', 1)->count();
        return $totalUser;

    }

    public function totalUsdt (){

        $getAccountBalance= Package::where('active_status','=',1)->sum('package_amount');
        return $getAccountBalance;

    }


}