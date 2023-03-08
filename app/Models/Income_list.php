<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income_list extends Model
{
    use HasFactory;		

    protected $fillable = [
        'income_name',
        'status',
    ];
}