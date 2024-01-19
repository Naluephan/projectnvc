<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesLeaveType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'leave_type_name',
    ];
}
