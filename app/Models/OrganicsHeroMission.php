<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganicsHeroMission extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_type_id',
        'mission_category_id',
        'mission_name',
        'mission_exp',
        'mission_details',
        'mission_image',
        'mission_status',
        'record_status',
    ];

    public function organicsHeroMissionType(){
        return $this->hasOne(OrganicsHeroMissionType::class,'id', 'mission_type_id');
    }

    public function organicsHeroMissionCategory(){
        return $this->hasOne(OrganicsHeroMissionCategory::class,'id', 'mission_category_id');
    }
}
