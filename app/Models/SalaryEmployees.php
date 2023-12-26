<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryEmployees extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'salary',
        'diligence_allowance',
        'overtime',
        'fuel_cost',
        'bonus',
        'interest',
        'commission',
        'get_orthers',
        'total_earning',
        'social_security_fund',
        'withholding_tax',
        'deposit',
        'absent_leave_late',
        'company_loan',
        'deposit_fund',
        'deduc_others',
        'total_deductions',
        'net_pay',
        'day',
        'month',
        'year',
    ];
    
}
