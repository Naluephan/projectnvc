<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupToolsEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'company_id',
        'department_id',
        'pickup_tools_id',
        'number_requested',
        'assets_and_supply_id',
        'status',
        'request_details',
    ];

    public function pickupTools(){
        return $this->hasOne(PickupTools::class,'id', 'pickup_tools_id');
    }

    public function company(){
        return $this->hasOne(Company::class,'id', 'company_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }
}
