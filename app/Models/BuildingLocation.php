<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'location_id',
        'location_name',
        'location_img',
        'total_floors',
        'total_rooms',
        'record_status'
    ];
    public function location()
    {
        return $this->hasMany(Location::class,'building_location_id');
    }
}
