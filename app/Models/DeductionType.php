<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionType extends Model
{
    use HasFactory;
    protected $table = 'hr_deduction_types';
    protected $fillable = [
        'name',
        'type',
        'priority',
        'status',
        'add_auto_status',
        'amount_auto',
    ];
}
