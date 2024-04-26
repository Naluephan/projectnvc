<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupToolsDeviceType extends Model
{
    use HasFactory;
    protected $fillable = [
        'device_types_name',
        'unit',
        'image'
    ];
}
