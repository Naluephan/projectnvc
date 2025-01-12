<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsAndSupplyCategories extends Model
{
    use HasFactory;
    protected $table = 'hr_asset_and_supply_categories';
    protected $fillable = [
        'name',
        'description',
        'abbreviation',
        'type'
    ];
}
