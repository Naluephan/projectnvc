<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveQuotas extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'leave_type_id',
        'quota',
        'year_quota',
    ];
}
