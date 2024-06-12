<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'status',
        'amount',
        // 'total_amount',
        'month',
        'year',
        // 'save_date',
        'channel',
        'withdraw_result',
        'fund_informations_id',
        // 'approve_status',
        // 'remark',
    ];
    public function informations(){
        return $this->belongsTo(FundInformation::class);
    }
}
