<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInsurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'group_insurance_img',
        'position_id',
        'department_id',
        'company_id',
    ];
    public function emp(){
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
    public function position(){
        return $this->hasOne(Position::class,'id','position_id');
    }
    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }
}
