<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingMoney extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'save_status',
        'amount',
        'total_amount',
        'month',
        'year',
        'save_date',
        'save_channel',
        'approve_status'
    ];
}
