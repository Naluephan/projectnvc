<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_th',
        'name_en',
        'description',
        'condition',
        'company_id',
    ];

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
}
