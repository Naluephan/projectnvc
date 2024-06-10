<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlexibleSpecialHours extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_time',
        'flexible_hours_log_lines_id',
        'action_date_start',
        'action_date_end',
        'description',
        'duration',
        'work_time_type',
    ];
    public function hoursloglines(){
        return $this->belongsTo(FlexibleHoursLogLine::class);
    }
}
