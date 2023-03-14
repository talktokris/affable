<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal_list extends Model
{
    use HasFactory;

			

    protected $fillable=[

        "member_income_id",
        "withdrawal_amount",
        "redistribution_amount",
        "cash_out_amount",
        "wallet_address",
        "transation_hash",
        "send_status",
        "invester_dis_status",
        "community_dis_amount",
        "community_dis_status",
        "sponser_dis_amount",
        "sponser_dis_status",
        "dolphin_amount",
        "dolphin_dis_status",
        "shark_amount",
        "shark_dis_status",
        "whale_amount",
        "whale_dis_status",
        "humpback_amount",
        "humpback_dis_status",
        "affable_amount",
        "affable_dis_status",

    ];
}