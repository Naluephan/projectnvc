<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'categories_comment_id',
        'topic_comment_name',
        'comments_details',
        'comments_status',
        'images',
    ];

}
