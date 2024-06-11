<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'upload_file_heads_id',
        'actions_name',
        'file_name',
        'file_path',
        'language_code',
    ];
}
