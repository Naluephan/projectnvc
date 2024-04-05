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
        'child_certificate',
        'saving_passbook',
        'marriage_certificate',
        'record_status',

    ];
    public function emp(){
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
    public function socialsecurity(){
        return $this->belongsTo(SocialSecurityType::class,'social_security_type_id','id');
    }
}
