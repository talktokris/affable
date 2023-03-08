<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;



    protected $fillable = [
        'batch_name',
        'get_percentage',
        'equivalent_number',
        'equivalent_batch',
        'min_package_required',
        'status'
    ];
}