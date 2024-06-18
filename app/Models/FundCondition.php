<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundCondition extends Model
{
    use HasFactory;
    protected $table = 'hr_fund_conditions';
    protected $fillable = [
        'value',
        'fund_informations_id',
        'type',
    ];
public function informations(){
    return $this->belongsTo(FundInformation::class);
}
}
