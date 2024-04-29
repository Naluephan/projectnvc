<?php

namespace App\Repositories\Impl;

use App\Models\Comment;
use App\Models\CommentTopic;
use App\Repositories\CommentTopicInterface;
use Illuminate\Support\Collection;

class CommentTopicRepository extends MasterRepository implements CommentTopicInterface

{
    protected $model;
    public function __construct(CommentTopic $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->with('categories')
        ->orderBy('categories_comment_id', 'asc')
        ->get();
    }
}
