<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupTools extends Model
{
    use HasFactory;
    protected $fillable = [
        'assets_and_supply_id',
        'requested_limit',
        'year_condition',
        'month_condition',
        'person_condition',
        'department_condition',
        'department_id'
    ];

    public function assetsAndSupplyCategories(){
        return $this->hasOne(AssetsAndSupplyCategories::class,'id', 'assets_and_supply_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }



}
