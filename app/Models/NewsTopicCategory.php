<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTopicCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'news_id',
        'news_name',
        'news_details',
    ];
}
