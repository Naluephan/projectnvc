<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'hr_stores';
    protected $fillable = [
        'name',
        'code',
        'company_id'
    ];
}
