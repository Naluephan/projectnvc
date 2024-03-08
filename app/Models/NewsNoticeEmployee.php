<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsNoticeEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_notice_id',
        'emp_id',
    ];
}
