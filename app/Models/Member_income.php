<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_income extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'trigger_user_id',
        'income_type_int',
        'income_type_word',
        'income_level',
        'income_level_compress',
        'income_amount',
        'pending_status',
    ];
}