<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayCategory extends Model
{
    use HasFactory;
    protected $table = 'hr_holiday_categories';
    protected $fillable = [
        'holiday_name',
        'holiday_start',
        'holiday_end',
    ];
}
