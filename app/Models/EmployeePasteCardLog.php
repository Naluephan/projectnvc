<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EmployeePasteCardLog extends Model
{
    use HasFactory;
    protected $table = "hr_employee_paste_card_log";
    protected $fillable = [
        'emp_id',
        'department_id',
        'paste_date',
        'status',
        'days',
        'month',
        'year',
        'image_capture',
    ];
    public function relatedEmpId()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
    public function relatedDepart()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
}
