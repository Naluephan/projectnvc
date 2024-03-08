<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCleanLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'location',
        'time',
        'time_start',
        'image_location',
        'qr_code',

    ];
}
