<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'company_id',
        'position_id',
        'department_id',
        'record_status',
    ];
    public function socialdetail(){
        return $this->hasMany(SocialSecurityFile::class,'social_type_id','id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function position(){
        return $this->belongsTo(Position::class,'position_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
  
}
