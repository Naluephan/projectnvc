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
    public function categories()
    {
        return $this->hasMany(Contracts::class, 'contract_category_id', 'id');
    }
    public function categoriesToChange()
    {
        return $this->hasMany(ContractsChange::class, 'contract_category_id', 'id');
    }
}
