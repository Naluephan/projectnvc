<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTransactionRewards extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'type',
        'status_transaction',
        'reward_id',
        'activity_id',
        'day',
        'month',
        'year'
    ];

    public function company(){
        return $this->hasOne(Company::class,'id', 'company_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }
}
