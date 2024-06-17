<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorktimePerson extends Model
{
    use HasFactory;
    protected $table = "hr_worktime_person";
    protected $fillable = [
        'emp_id',
        'worktime_day1',
        'worktime_day2',
        'worktime_day3',
        'worktime_day4',
        'worktime_day5',
        'worktime_day6',
        'worktime_day7',
        'flexible_hours_log_lines_id'
    ];
    public function relateHoursLogLinesId(){
        return $this->belongsTo(FlexibleHoursLogLine::class);
    }
}
