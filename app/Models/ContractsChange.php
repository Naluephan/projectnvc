<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractsChange extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'con_type_name',
        'change_details',
        'images',
    ];
}
