<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_id',
        'comment_id',
        'comments_details',
        'comments_status',
        'images',
    ];
    public function comEmpId()
    {
        return $this->belongsTo(Employee::class, 'emp_id', 'id');
    }

    public function commentId()
    {
        return $this->belongsTo(CommentTopic::class, 'comment_id', 'id');
    }
}
