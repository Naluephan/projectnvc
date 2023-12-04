<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'position_id',
        'department_id',
        'employee_code',
        'pre_name',
        'f_name',
        'l_name',
        'n_name',
        'birthday',
        'mobile',
        'card_add',
        'current_add',
        'id_card',
        'start_date',
        'end_date',
        'y_experience',
        'image',
        'employee_card_id',
        'gender_id',
        

    ];

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function position(){
        return $this->belongsTo(Position::class,'position_id');
    }
}
