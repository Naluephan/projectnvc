<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganicsHeroMissionEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'mission_id',
        'record_status',
    ];

    public function organicsHeroMission(){
        return $this->hasOne(OrganicsHeroMission::class,'id', 'mission_id');
    }
}
