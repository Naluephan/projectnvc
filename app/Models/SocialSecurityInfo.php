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
    public function socialfile(){
        return $this->belongsTo(SocialSecurity::class,'social_security_id','id');
    }
}
