<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsNotice extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_notice_name',
        'news_notice_description',
        'notice_category_id',
        'news_priority',
        'record_status',
    ];

    public function newsCategory(){
        return $this->belongsTo(NewsCategory::class,'notice_category_id');
    }
}
