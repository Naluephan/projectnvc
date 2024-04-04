<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'titel_id',
        'detail',
        'step_status',
        'send_date',
        'approve_date',
        'not_approve_date',
        'success_date',
        'cancel_date',
    ];
}
