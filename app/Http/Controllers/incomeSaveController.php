<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_income;

class incomeSaveController extends Controller
{
    
    public function incomeSave($from_user_id, $to_user_id, $trigger_user_id, $income_type_int, $income_type_word, $income_level, $income_level_compress, $income_amount, $pending_status=0, $debit_credit_status=0, $withdrawal_remarks=null){


                $incomeSave = new Member_income;

                $incomeSave->debit_credit_status= $debit_credit_status;
                $incomeSave->withdrawal_remarks= $withdrawal_remarks;
                $incomeSave->from_user_id= $from_user_id;
                $incomeSave->to_user_id= $to_user_id;
                $incomeSave->trigger_user_id= $trigger_user_id;
                $incomeSave->income_type_int= $income_type_int;
                $incomeSave->income_type_word= $income_type_word;
                $incomeSave->income_level= $income_level;
                $incomeSave->income_level_compress= $income_level_compress;
                $incomeSave->income_amount= round($income_amount, 2);
                $incomeSave->pending_status= $pending_status;
                $incomeSave->save();

                

                if($incomeSave){ 

                    $data = ['status'=>1, 'id'=>$incomeSave->id];

                    $objectData= (object)$data;
                }
            
                else {
                    $data = ['status'=>0, 'id'=>$incomeSave->id];

                    $objectData= (object)$data;
                   }


                //   dd($objectData);

                return $objectData;


            }
}