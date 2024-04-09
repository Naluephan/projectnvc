<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractsDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_type_name',
        'contract_details',
        'images',
    ];
}
