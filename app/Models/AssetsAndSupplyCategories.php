<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsAndSupplyCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'device_code',
        'type'
    ];
}
