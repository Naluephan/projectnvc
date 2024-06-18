<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsAndSupply extends Model
{
    use HasFactory;
    protected $table = 'hr_asset_and_supplies';
    protected $fillable = [
        'device_name',
        'units_id',
        // 'file_type',
        'assets_and_supply_categories_id',
        'description',
        'minimum_alert',
        'maximum_alert',
        'status_property',
        'cost_price',
        'limit_year',
        'depreciation',
        // 'levels_id',
        'month_inspec',
        'start_inspec',
        'inspec_by_department_id',
        'asset_code'
    ];
    public function units(){
        return $this->belongsTo(Units::class);
    }
    public function categories(){
        return $this->belongsTo(AssetsAndSupplyCategories::class);
    }
}
