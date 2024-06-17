<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceSetting extends Model
{
    use HasFactory;
    protected $table = 'hr_maintenance_settings';
    protected $fillable = [
        'name',
        'locations_id',
        'maintenance_patrol',
        'maintenance_time',
        'maintenance_img',
        'record_status',
        'qr_code'
    ];
    public function locations(){
       return $this->belongsTo(Location::class);
    }
}
