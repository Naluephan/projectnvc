<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $table = 'hr_holidays';
    protected $fillable = [
        'holiday_name',
        'holiday_start',
        'holiday_end',
        'active',
    ];
}
