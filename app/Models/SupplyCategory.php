<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_code',
    ];
}
