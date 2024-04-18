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
        'status_repair',
        'status_requested',
        'request_details',
        'created_at',
        'approve_at',
        'not_approved_at',
        'cancel_at',
        'updated_at',
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
