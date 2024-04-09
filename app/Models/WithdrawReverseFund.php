<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawReverseFund extends Model
{
    use HasFactory;
    protected $fillable = [
        'reserse_fund_id',
        'reserse_fund_detail',
        'status',
    ];
    public function withdraw(){
        return $this->belongsTo(ReserveFund::class,'reserse_fund_id','id');
    }


}
