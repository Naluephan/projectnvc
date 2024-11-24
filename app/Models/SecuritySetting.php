<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecuritySetting extends Model
{
    use HasFactory;
    protected $table = 'hr_security_settings';
    protected $fillable = [
        'name',
        'locations_id',
        'security_patrol',
        'security_time',
        'security_img',
        'record_status',
        'user_id'
    ];
    public function locations(){
       return $this->belongsTo(Location::class);
    }
    public function users(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
