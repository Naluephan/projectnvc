<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'dc_code',
        'pay_month',
        'pay_year',
        'date_create',
    ];
}
