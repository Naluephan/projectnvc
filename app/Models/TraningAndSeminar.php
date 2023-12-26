<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraningAndSeminar extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'detail',
        'status',
        'cert',
        'count_emp',
        'day_start',
        'day_end',
        'month_start',
        'month_end',
        'year_start',
        'year_end',
    ];

    public function tasEmps(){
        return $this->hasMany(TasEmployees::class,'tas_id');
    }
    protected $appends = ['count_participate'];

    public function getCountParticipateAttribute($key)
    {
        $count_participate = count($this->tasEmps);
        return $count_participate;
    }
}
