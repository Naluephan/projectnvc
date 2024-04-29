<?php

namespace App\Repositories\Impl;

use App\Models\Comment;
use App\Repositories\CommentInterface;
use Illuminate\Support\Collection;

class CommentRepository extends MasterRepository implements CommentInterface

{
    protected $model;
    public function __construct(Comment $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
    // public function getAll()
    // {
    //     return $this->model->with(['commentType'])->get();
    // }
}
