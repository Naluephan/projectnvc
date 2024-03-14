<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupTools extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'device_types_id',
        'number_requested',
    ];

    public function pickupToolsDeviceType(){
        return $this->belongsTo(PickupToolsDeviceType::class,'device_types_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
