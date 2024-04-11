<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardCoinHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'type_reward_id',
        'reward_name',
        'reward_image',
        'reward_coins_change',
        'status_display'
    ];
}
