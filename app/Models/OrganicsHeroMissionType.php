<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganicsHeroMissionType extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_type_name',
        'record_status',
    ];
}
