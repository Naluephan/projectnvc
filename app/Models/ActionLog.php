<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'status_log',
        'module_id',
        'module_name',
        'module_code',
        'employee_id'
    ];

    public function employeeDevices(){
        return $this->hasOne(EmployeeDevices::class,'id', 'module_id');
    }
}
