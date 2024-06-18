<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityFileHead extends Model
{
    use HasFactory;
    protected $table = 'hr_social_security_group_file_heads';
    protected $fillable = [
        'social_file_types_id',
        'file_upload_id',

    ];
    // public function socialtype(){
    //     return $this->belongsTo(SocialSecurityType::class,'social_type_id','id');
    // }
    ////////////////////////////////////////////////////////////////////////////////////// ใช้ข้างล่าง
    // public function socialfile(){
    //     return $this->hasOne(SocialSecurityInfo::class,'social_security_file','id');
    // }
}
