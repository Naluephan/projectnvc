<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDevices extends Model
{
    use HasFactory;
    protected $fillable = [
        'pickup_tools_employees_id',
        'create_date',
        'asset_code',
        'amount',
        'status'
    ];
}
