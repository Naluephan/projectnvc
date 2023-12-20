<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasEmployees extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'tas_id',
        'participate_status',
        'cert_status',
        'remark1',
        'remark2',
        'remark3',
    ];
}
