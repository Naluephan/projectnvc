<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'leave_type_id',
        'leave_type_title',
        'status_manager_approve',
        'status_hr__approve',
        'leave_detail',
        'leave_img1',
        'leave_img2',
        'leave_img3',
        'leave_img4',
        'leave_img5',
        'leave_date_start',
        'leave_date_end',
        'sum_hours',
        'month',
        'year',
        'days',
    ];
}
