<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_file_attach',
        'social_type_id',

    ];
    // public function socialfile(){
    //     return $this->belongsTo(SocialSecurityType::class,'id','social_security_file');
    // }
    public function socialfile(){
        return $this->hasMany(SocialSecurityInfo::class,'social_security_file','id');
    }
}
