<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawReverseFund extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'reserse_fund_id',
        'reserse_fund_detail',
        'reserve_request',
    ];
    public function withdraw(){
        return $this->belongsTo(ReserveFund::class,'reserse_fund_id','id');
    }
    public function empsalary(){
        return $this->belongsTo(SalaryEmployees::class,'emp_id','emp_id');
    }



}
