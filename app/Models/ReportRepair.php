<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRepair extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories_id',
        'emp_id',
        'equipment_name',
        'repair_detail',
        'images',
        'report_status',
    ];
    public function repairEmpId()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }
    public function categoriesId()
    {
        return $this->belongsTo(ReportRepairCategories::class, 'categories_id', 'id');
    }
}
