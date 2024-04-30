<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories_comment_name',
    ];
    public function categories()
    {
        return $this->hasMany(CommentTopic::class, 'categories_comment_id', 'id');
    }
}
