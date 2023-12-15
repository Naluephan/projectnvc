<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_th',
        'name_en',
        'company_id'
    ];

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }
}
