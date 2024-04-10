<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_security_file',
        'social_security_id',
        'doc_name',
        'doc_file',
    ];
    public function socialemp(){
        return $this->belongsTo(SocialSecurity::class,'social_security_id','id');
    }
    // public function socialfile(){
    //     return $this->hasMany(SocialSecurityType::class,'social_security_file','id');
    // }
    public function socialsecurity(){
        return $this->hasMany(SocialSecurityType::class,'id','social_security_file');
    }
}
