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
        'day_start',
        'day_end',
        'month_start',
        'month_end',
        'year_start',
        'year_end',
    ];
}
