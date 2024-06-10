<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlexibleHoursLogLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'am_worktime_start',
        'am_worktime_end',
        'pm_worktime_start',
        'pm_worktime_end',
        'start_late_am',
        'end_late_pm',
        'description',

    ];
}
