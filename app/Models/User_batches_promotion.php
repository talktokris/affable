<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_batches_promotion extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'upline',
        'reff_id',
        'wallet_address',
        'carry_gen',
        'status'
    ];
}