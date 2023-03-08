<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'wallet_address',
        'package_amount',
        'transation_hash',
        'paid_status',
        'active_status'
    ];
}