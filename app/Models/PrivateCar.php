<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateCar extends Model
{
    use HasFactory;
    protected $table = 'hr_private_cars';

    protected $fillable = [
        'emp_id',
        'company_id',
        'department_id',
        'car_category_id',
        'car_registration',
        'car_brand',
        'car_color',
        'car_image',
        'transasction_requests_id',

    ];

    public function company(){
        return $this->hasOne(Company::class,'id', 'company_id');
    }

    public function department(){
        return $this->hasOne(Department::class,'id', 'department_id');
    }
}
