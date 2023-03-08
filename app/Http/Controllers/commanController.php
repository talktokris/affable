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
        $memberData = Member::where('user_id', $user_id)->get()->toArray();
        $minWithAmount=25;
        $reDisPer=50;

        $dataSet=[
            'totalUser'=>$totalUser,
            'totalMatic'=>$totalMatic,
            'reffLink'=>$reffLinkDomain.'/'.$memberData[0]['user_id'],
            'wallet'=>$memberData[0]['wallet_address'],
            'userID'=>$memberData[0]['user_id'],
            'logType'=>$type,
            'uplineID'=>$memberData[0]['upline'],
            'matic'=>$this->accountBalance($user_id, $type),
            'reDisPer'=>$reDisPer,
            'minWithAmount'=>$minWithAmount,
        ];

            return $dataSet;
            
         //   dd($dataSet);
    }

    public function accountBalance ($user_id, $type){

        $getAccountBalance= Member_income::where('to_user_id','=',$user_id)->sum('income_amount');
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