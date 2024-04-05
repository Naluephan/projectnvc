<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupInsurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'group_insurance_img',
    ];
    public function emp(){
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
}
