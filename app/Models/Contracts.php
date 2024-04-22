<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contracts extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_category_id',
        'emp_id',
        'contract_details',
        'images',
    ];
}
