<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityCoins extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_name',
        'activity_image',
        'activity_description',
        'activity_coins_change',
    ];
}
