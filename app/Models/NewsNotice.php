<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsNotice extends Model
{
    use HasFactory;

    protected $fillable = [
        'news_notice_name',
        'notice_category_id',
        'news_notice_description',
        'news_priority',
        'news_img1',
        'news_img2',
        'news_img3',
        'published_at',
        'cancelled_at',
        'record_status',
    ];

    public function newsType(){
        return $this->belongsTo(NewsType::class,'notice_category_id');
    }
}
