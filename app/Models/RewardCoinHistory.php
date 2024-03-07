<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardCoinHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_reward',
        'reward_name',
        'reward_image',
        'reward_coins_change',
        'record_status'
    ];
}
