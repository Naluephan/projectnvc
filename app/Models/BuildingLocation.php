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
    ];
    public function places(){
        return $this->belongsTo(Location::class,'id');
    }
}
