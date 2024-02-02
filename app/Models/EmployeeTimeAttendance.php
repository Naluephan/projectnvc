<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeTimeAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'month',
        'year',
        'status',
    ];
}
