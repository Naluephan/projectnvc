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
        'aprrove_status',
        'record_status',

    ];
    public function emp(){
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
    // public function socialfile(){
    //     return $this->hasMany(SocialSecurityFile::class,'social_type_id','id');
    // }
    public function socialsecurity(){
        return $this->hasMany(SocialSecurityType::class,'id','social_security_type_id');
    }

}
