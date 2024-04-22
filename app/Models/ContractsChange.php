<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractsChange extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'contract_category_id',
        'change_details',
        'contract_status',
        'images',
    ];
}
