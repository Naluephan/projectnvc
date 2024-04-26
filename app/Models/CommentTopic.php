<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentTopic extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories_comment_id',
        'topic_comment_name',
    ];
}
