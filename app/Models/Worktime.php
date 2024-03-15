<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_id',
        'worktime_day',
        'work_time',
    ];
    public function departments(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}

