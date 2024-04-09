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
    public function socialtype(){
        return $this->belongsTo(SocialSecurityType::class,'social_type_id','id');
    }
}
