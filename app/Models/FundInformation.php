<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundInformation extends Model
{
    use HasFactory;
    protected $table = 'hr_fund_informations';
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'initialInvestment',
        'description',
    ];
}
