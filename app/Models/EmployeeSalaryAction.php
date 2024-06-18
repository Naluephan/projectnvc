<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryAction extends Model
{
    use HasFactory;
    protected $table = 'hr_emp_salary_actions';
    protected $fillable = [
        'emp_id',
        'action_type',
        'action_id'
    ];
}
