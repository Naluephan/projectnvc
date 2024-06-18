<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    use HasFactory;
    protected $table = 'hr_honors';
    protected $fillable = [
        'emp_id',
        'honor_category_id',
        'company_id',
        'position_id',
        'department_id',
        'honor_img',
        'honor_detail',
        'transaction_requests_id',
        'status_active',
    ];
    // public function emp(){
    //     return $this->hasOne(Employee::class,'id','emp_id');
    // }
    // public function honortype(){
    //     return $this->belongsTo(HonorType::class,'honor_category_type_id');
    // }
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
}
