<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_th',
        'name_en',
        'department_id',
        'company_id',
    ];

    public function users(){
        return $this->hasMany(Employee::class,'position_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
}
