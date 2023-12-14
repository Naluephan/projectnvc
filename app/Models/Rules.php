<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;
    protected $fillable = [
        'rules_category_id',
        'rules_name',
        'company_id',
    ];
}
