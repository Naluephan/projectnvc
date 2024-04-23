<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'honor_category_id',
        'honor_category_type_id',
        //  'company_id',
        // 'department_id',
        // 'position_id',
        'honor_img',
        'honor_detail',
        'record_status',

    ];
    // public function emp(){
    //     return $this->hasOne(Employee::class,'id','emp_id');
    // }
    public function honortype(){
        return $this->belongsTo(HonorType::class,'honor_category_type_id');
    }
}
