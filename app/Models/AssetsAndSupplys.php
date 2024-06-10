<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsAndSupplys extends Model
{
    use HasFactory;
    protected $fillable = [
        'device_name',
        'units_id',
        'file_type',
        'assets_and_supply_categories_id',
        'description',
        'limit_min',
        'limit_max',
        'status_property',
        'cost_price',
        'limit_year',
        'depreciation',
        'levels_id',
        'month_inspec',
        'start_inspec',
        'department_inspec'
    ];
}
