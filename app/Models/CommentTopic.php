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
    public function categories()
    {
        return $this->belongsTo(CommentCategories::class, 'categories_comment_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id', 'id');
    }
}
