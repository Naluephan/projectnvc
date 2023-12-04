<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_th',
        'name_en',
    ];

    public function users(){
        return $this->hasMany(Employee::class,'position_id');
    }
}
