<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'deduction_types_id',
        'amount_value',
        'status_active',
        'salary_transactions_id',
        'module_id',
        'module_name',
    ];
    public function salarys(){
        return $this->belongsTo(SalaryTransaction::class);
    }
    public function types(){
        return $this->belongsTo(DeductionType::class);
    }
}
