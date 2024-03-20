<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'car_category_id',
        'car_registration',
        'car_brand',
        'car_color',
        'car_image',
        'record_status',

    ];
}
