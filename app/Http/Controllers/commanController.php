<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class commanController extends Controller

{
    //



    public function headerInfo($user_id, $type){

        $reffLinkDomain = 'domain.com/en';
        $totalUser = 3500235;
        $totalMatic = 12302323;
        $memberData = Member::where('user_id', $user_id)->get()->toArray();

        $dataSet=[
            'totalUser'=>$totalUser,
            'totalMatic'=>$totalMatic,
            'reffLink'=>$reffLinkDomain.'/'.$memberData[0]['user_id'],
            'wallet'=>$memberData[0]['wallet_address'],
            'userID'=>$memberData[0]['user_id'],
            'logType'=>$type,
            'uplineID'=>$memberData[0]['upline'],
            'matic'=>$totalUser];

            return $dataSet;
            
         //   dd($dataSet);
    }
}