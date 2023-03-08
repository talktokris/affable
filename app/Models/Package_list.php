<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_list extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_amount',
        'status',

    ];
}