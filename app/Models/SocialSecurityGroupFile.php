<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityGroupFile extends Model
{
    use HasFactory;
    protected $table = 'hr_social_security_group_files';
    protected $fillable = [
        'social_security_file',
        'social_security_types_id',
        'doc_name',
    ];
    public function socialemp(){
        return $this->belongsTo(SocialSecurity::class,'social_security_id','id');
    }
    // public function socialfile(){
    //     return $this->hasMany(SocialSecurityType::class,'social_security_file','id');
    // }
    public function socialsecurity(){
        return $this->hasMany(SocialSecurityType::class,'social_security_id','id');
    }
}
