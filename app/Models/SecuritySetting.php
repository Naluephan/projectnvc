<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecuritySetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'security_patrol',
        'security_time',
        'security_img',
        'record_status'
    ];
}
