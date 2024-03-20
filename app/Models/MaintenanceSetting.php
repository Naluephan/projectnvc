<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'maintenance_patrol',
        'maintenance_time',
        'maintenance_img',
        'record_status'
    ];
}
