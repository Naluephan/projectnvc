<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardCoin extends Model
{
    use HasFactory;
    protected $fillable = [
        'reward_name',
        'reward_image',
        'reward_description',
        'reward_coins_change',
    ];
}
