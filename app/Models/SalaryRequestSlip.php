<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryRequestSlip extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'month_request',
        'reason_request',
        'request_approve',
        'record_status'
    ];

    public function employees(){
        return $this->belongsTo(Employee::class,'emp_id');
    }
}
