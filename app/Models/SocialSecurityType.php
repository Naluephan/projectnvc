<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSecurityType extends Model
{
    use HasFactory;
    protected $fillable = [
        'social_security_type_name',
    ];
}
