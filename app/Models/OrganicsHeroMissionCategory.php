<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganicsHeroMissionCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_type_id',
        'mission_category_name',
        'record_status',
    ];
}
