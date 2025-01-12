<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_th',
        'name_en',
        'short_name',
        'address_th',
        'address_en',
        'contact_number',
        'website',
        'email',
        'logo',
        'order_prefix',
        'record_status',
    ];

    //OUT [PK]
    public function users(){
        return $this->hasMany(User::class,'company_id');
    }

    public function employee(){
        return $this->hasMany(Employee::class,'company_id');
    }
}
