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
        'company_id',
        'department_id',
        'position_id',
        'reserve',
        'contribution',
        'total_month',
        'accumulate_balance',
        'record_status',

    ];
    public function emp(){
        return $this->hasOne(Employee::class,'id','emp_id');
    }
    // public function company(){
    //     return $this->hasOne(Company::class,'id','company_id');
    // }
    // public function position(){
    //     return $this->hasOne(Position::class,'id','position_id');
    // }
    // public function department(){
    //     return $this->hasOne(Department::class,'id','department_id');
    // }
}
