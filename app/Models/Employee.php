<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Employee extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'company_id',
        'position_id',
        'department_id',
        'employee_card_id',
        'employee_code',
        'pre_name',
        'f_name',
        'l_name',
        'n_name',
        'gender_id',
        'birthday',
        'mobile',
        'card_add',
        'current_add',
        'id_card',
        'start_date',
        'end_date',
        'y_experience',
        'image',
        'record_status',
        'coins',
        'username',
        'password',
        'pin',
        'status',
    ];

    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function position(){
        return $this->belongsTo(Position::class,'position_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
