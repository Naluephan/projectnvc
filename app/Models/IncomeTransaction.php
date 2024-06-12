<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'income_type_id',
        'amount_value',
        'status_active',
        'salary_transactions_id',
    ];
    public function salarys(){
        return $this->belongsTo(SalaryTransaction::class);
    }
    public function types(){
        return $this->belongsTo(IncomeType::class);
    }
}
