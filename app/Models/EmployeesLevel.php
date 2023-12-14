<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'employees_id',
        'level_id',
        'promote_description',
        'promote_date',
        'company_id',
    ];
}
