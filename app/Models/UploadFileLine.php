<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFileLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'actions_name',
        'file_name',
        'file_path',
        'language_code',
        'file_detail',
        'module_id',
        'module_name',
    ];
}
