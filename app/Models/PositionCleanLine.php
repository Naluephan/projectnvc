<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionCleanLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'locations_id',
        'time',
        'time_start',
        'qr_code',

    ];
    public function locations(){
       return $this->belongsTo(Location::class);
    }
}
