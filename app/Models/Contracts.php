<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;
    protected $table = 'hr_contracts';
    protected $fillable = [
        'contract_category_id',
        'emp_id',
        'contract_details',
        'images',
        'transaction_requests_id'
    ];
    public function categoriesContractsId()
    {
        return $this->belongsTo(ContractsCategories::class, 'contract_category_id', 'id');
    }
}
