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
        'record_status',
    ];
    public function socialdetail(){
        return $this->hasMany(SocialSecurityFile::class,'social_type_id','id');
    }
}
