<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardCoinHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'company_id',
        'department_id',
        'type_reward_id',
        'reward_name',
        'reward_image',
        'reward_coins_change',
        'status_approved'
    ];

    public function company(){
        return $this->hasOne(Company::class,'id', 'company_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }
}
