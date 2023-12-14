<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryRules extends Model
{
    use HasFactory;
    protected $fillable = [
        'rules_category_name',
    ];
}
