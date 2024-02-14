<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveType extends Model
{
    use HasFactory;
    protected $table = "emp_leave_type";
    protected $fillable = [
        'id',
        'leave_type_name',
    ];
}
