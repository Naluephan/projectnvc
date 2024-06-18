<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetAndSupplySetup extends Model
{
    use HasFactory;
    protected $table = 'hr_asset_and_supply_setups';
    protected $fillable = [
        'assets_and_supply_id',
        'requested_limit',
        // 'year_condition',
        'condition',
        // 'person_condition',
        'emp_id',
        'department_id'
    ];

    public function assetsAndSupplyCategories(){
        return $this->hasOne(AssetsAndSupplyCategories::class,'id', 'assets_and_supply_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }



}
