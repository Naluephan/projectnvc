<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_th',
        'name_en',
        'company_id',
        'image_departments',
        'position_count',
        'record_status',
    ];

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }

    public function position(){
        return $this->hasMany(Position::class,'department_id');
    }

    public function pickupTools(){
        return $this->hasMany(PickupTools::class,'department_id','id');
    }
}
