<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'level_id',
        'promote_description',
        'promote_date',
        'company_id',
    ];
}
