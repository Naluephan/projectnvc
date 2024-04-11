<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_changed_id',
        'info_changed',
        'details_changed',
        'images',
        'change_status',
    ];
}
