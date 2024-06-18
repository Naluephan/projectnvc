<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundParticipant extends Model
{
    use HasFactory;
    protected $table = 'hr_fund_participants';
    protected $fillable = [
        'emp_id',
        'fund_conditions_id',
        'fund_informations_id',
    ];
public function conditions(){
    return $this->belongsTo(FundCondition::class);
}
public function informations(){
    return $this->belongsTo(FundInformation::class);
}
public function emp(){
    return $this->belongsTo(Employee::class,'emp_id','id');
}
}
