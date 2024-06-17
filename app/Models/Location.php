<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'building_location_id',
        'floor',
        'place_name',

    ];
    public function buildingLocation(){
        return $this->hasOne(BuildingLocation::class,'id','building_location_id');
    }
}
