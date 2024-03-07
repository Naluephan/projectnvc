<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_news',
        'announcer_id',
        'news_description',
        'news_img1',
        'news_img2',
        'news_img3',
        'record_status',
        'published_at',
        'cancelled_at',
    ];

    public function newsCategory(){
        return $this->belongsTo(NewsCategory::class,'newsCate_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'id');
    }
}
