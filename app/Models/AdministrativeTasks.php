<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeTasks extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'honor_category_id',
        'company_id',
        'position_id',
        'department_id',
        'honor_img',
        'honor_detail',
        'transaction_requests_id',
        'status_active',
    ];
}
