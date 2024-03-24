<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupTools extends Model
{
    use HasFactory;
    protected $fillable = [
        'position_id',
        'device_types_id',
        'number_requested',
    ];

}
