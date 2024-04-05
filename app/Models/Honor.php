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
        'honor_img',
        'honor_detail',
        'record_status',

    ];
    public function emp(){
        return $this->belongsTo(Employee::class,'emp_id','id');
    }
}
