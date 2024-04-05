<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReserveFund extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'reserve_fund_number',
        'saving_rate',
        'day',
        'month',
        'year',
        'date',
        'reserve',
        'contribution',
        'total_month',
        'accumulate_balance',
        'record_status',

    ];
    public function emp(){
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
}
