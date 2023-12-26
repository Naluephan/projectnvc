<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class EmployeePasteCardLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'paste_date',
        'image_capture',
        'year',
        'month',
        'status',
        'days',
    ];
    
}
