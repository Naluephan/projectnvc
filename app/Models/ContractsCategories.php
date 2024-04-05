<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractsCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories_contract_name',
    ];
}
