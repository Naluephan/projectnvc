<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurity extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'social_security_type_id',
        // 'social_security_type_name',
        'company_id',
        'department_id',
        'position_id',
        'aprrove_status',
        'record_status',

    ];
    public function emp(){
        return $this->hasOne(Employee::class,'id','emp_id');
    }
    // public function socialfile(){
    //     return $this->hasMany(SocialSecurityFile::class,'social_type_id','id');
    // }
    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
    public function position(){
        return $this->hasOne(Position::class,'id','position_id');
    }
    public function department(){
        return $this->hasOne(Department::class,'id','department_id');
    }
    public function socialsecurity(){
        return $this->hasMany(SocialSecurityType::class,'id','social_security_type_id');
    }

}
